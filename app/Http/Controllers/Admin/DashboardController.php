<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;

class DashboardController extends Controller
{
    //index
    public function index(){
        $orders = Order::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at',date('Y'))
                            ->groupBy(DB::raw('Month(created_at)'))
                            ->pluck('count');
        $totalSales = Order::select(DB::raw("SUM(grand_total) as totalSales"))
                            ->whereYear('created_at',date('Y'))
                            ->groupBy(DB::raw('Month(created_at)'))
                            ->pluck('totalSales');
        $months = Order::select(DB::raw("Month(created_at) as month"))
                            ->whereYear('created_at',date('Y'))
                            ->groupBy(DB::raw('Month(created_at)'))
                            ->pluck('month');
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        $salesByMonth = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($months as $index=>$month){
            $data[$month] = $orders[$index];
            $salesByMonth[$month] = $totalSales[$index];
        }

        return view('admin.dashboard')->with(['data'=>$data,'salesByMonth'=>$salesByMonth]);
    }
}