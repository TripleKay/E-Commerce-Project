<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\StateDivision;
use App\Http\Controllers\Controller;
use App\Models\Township;

class CheckoutController extends Controller
{
    //checkout page
    public function checkoutPage(){
        $stateDivisions = StateDivision::get();
        return view('frontEnd.checkout')->with(['stateDivisions'=>$stateDivisions]);
    }

    //get city ajax
    public function getCity(Request $request){
        $cities = City::where('state_division_id',$request->id)->get();
        return response()->json([
            'cities' => $cities,
        ]);
    }

    //get township ajax
    public function getTownship(Request $request){
        $townships = Township::where('city_id',$request->id)->get();
        return response()->json([
            'townships' => $townships,
        ]);
    }

    // ---------------for coupon--------------

        //apply coupon
        public function applyCoupon(Request $request){
            $coupon = Coupon::where('coupon_code',$request->couponCode)->first();
            if(!empty($coupon)){
                if($coupon->start_date <= Carbon::now() && $coupon->end_date >= Carbon::now()){
                    $data = $this->requestCouponData($coupon);
                    Session::put('coupon',$data);
                    return response()->json([
                        'coupon' => $coupon,
                    ]);
                }else{
                    return response()->json([
                        'error' => 'sorry,your coupon is expired',
                    ]);
                }
            }
            return response()->json([
                'error' => 'fails',
            ]);
        }
        //show grandtotal ajax
        public function showGrandTotal(){
            if(Session::has('coupon')){
                $data = Session::get('coupon');
                return response()->json([
                    'coupon' => 'yes',
                    'subTotal' =>  Session::get('total'),
                    'couponDiscount' => $data['couponDiscount'],
                    'grandTotal' => $data['totalAmount']
                ]);
            }else{
                return response()->json([
                    'coupon' => 'no',
                    'subTotal' => Session::get('total')
                ]);
            }
        }

        //get request coupon data
        private function requestCouponData($coupon){
            $cartTotalAmount = Session::get('total');
            $discountAmount = round($cartTotalAmount * $coupon->coupon_discount/100);
            $totalAmount = $cartTotalAmount - $discountAmount;
            return [
                'couponCode' => $coupon->coupon_code,
                'couponDiscount' => $coupon->coupon_discount,
                'discontAmount' => $discountAmount,
                'totalAmount' => $totalAmount,
            ];
        }
}