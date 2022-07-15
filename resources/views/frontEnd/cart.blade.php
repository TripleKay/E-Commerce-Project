@extends('frontEnd.layouts.app')
@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item"><a href="#">Library</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row min-vh-100">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-header bg-white">
                            <h5 class="my-2">My Carts</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-nowrap ">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th style="">Product</th>
                                            <th style="width:20%">Name</th>
                                            <th style="width:10%">Color</th>
                                            <th style="width:10%">Size</th>
                                            <th style="width:10%">Unit Price</th>
                                            <th style="width:8%">Quantity</th>
                                            <th style="width:15%" class="text-center">Total</th>
                                            <th style="">Remove</th>
                                        </tr>
                                    </thead>
                                    @if (Session::has('cart'))
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach (Session::get('cart') as $key => $item)
                                                <tr class="text-center">
                                                    <td class="align-middle">{{ $i++ }}</td>
                                                    <td class="align-middle">
                                                        <img src="{{ asset('uploads/products/'.$item['productImage']) }}" alt="" srcset="" style="width: 100px; heigth: 100px">
                                                    </td>
                                                    <td class="text-start align-middle">{{ $item['productName'] }}</td>
                                                    <td class="align-middle">{{ empty($item['color']) ? '.....' : $item['color'] }}</td>
                                                    <td class="align-middle">{{ empty($item['size']) ? '.....' : $item['size'] }}</td>
                                                    <td class="align-middle">{{ $item['price'] }} Ks</td>
                                                    <td class="align-middle">
                                                        <input type="number" id="{{ $key }}" class="qtyInput form-control" placeholder="qty" min="1" max="10" value="{{ $item['quantity'] }}" >
                                                    </td>
                                                    <td class="align-middle">{{ $item['price'] * $item['quantity'] }} Ks</td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('frontend#deleteCart',$key) }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr class="text-end">
                                                <td colspan="9">
                                                    <h5>Sub Total : {{$total}} Ks</h5>
                                                </td>
                                            </tr>
                                        </tfoot> --}}
                                    @else
                                        <tbody>
                                            <tr class="text-center text-danger">
                                                <td colspan="9" class=" py-3">
                                                    There is No Carts
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endif
                                </table>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    @if (Session::has('coupon'))
                                        <div class="applyCouponBox card border-0 rounded mb-3 bg-light p-3">
                                            <div class="d-flex justify-content-between mb-3">
                                                <p class="mb-0">Your Coupon :</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">Happy new year</h6>
                                                    <a href="{{ route('user#deleteCoupon') }}" class="ms-3 btn btn-outline-danger btn-sm "><i class="fas fa-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between ">
                                                <p class="mb-0">Coupon Discount(%) :</p>
                                                <h6 class="mb-0">-50%</h6>
                                            </div>
                                        </div>
                                    @else
                                        <div class="applyCouponBox card border-0 rounded mb-3">
                                            <div class="">
                                                <h5>Discount Code</h5>
                                                <p class="text-black-50">Enter your coupon code if you have one.....</p>
                                            </div>
                                            {{-- <hr> --}}
                                            <div class="">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <input type="text" class="couponCode form-control" placeholder="enter your coupon...">
                                                    <button type="button" onclick="applyCoupon()" class="btn btn-outline-primary text-nowrap ms-2">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    @php
                                        $subTotal = Session::has('subTotal') ? Session::get('subTotal') : '0';
                                        $couponDiscount = Session::has('coupon') ? Session::get('coupon')['couponDiscount'] : '0';
                                        $discountAmount = round($subTotal * $couponDiscount/100);
                                        $GrandTotal = $subTotal - $discountAmount;
                                    @endphp
                                    <div class="card border-0 bg-light py-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h6 class="mb-0">Sub Total :</h6>
                                                <h5 class="mb-0">{{$subTotal}} Ks</h5>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0">Coupon Discount :</h6>
                                                <h5 class="couponDiscount mb-0">-{{ $discountAmount }} Ks</h5>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between ">
                                                <h6 class="mb-0">Grand Total :</h6>
                                                <h5 class="mb-0">{{ $GrandTotal }} Ks</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-end my-2 mt-5">
                                        <a href="#" class=" btn btn-outline-primary">Continous Shopping</a>
                                        <a href="{{ route('user#checkout') }}" class="ms-3 btn btn-primary text-white">Proceed To Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    // -----------for coupon-------------
    function applyCoupon(){
        let couponCode = $('.couponCode').val();
        if(couponCode){
            $.ajax({
                url: "{{ route('user#applyCoupon') }}",
                method: "post",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    couponCode: couponCode,
                },
                success:function(response){
                    if(response.error){
                        Swal.fire({
                            icon: 'error',
                            title: response.error,
                        });
                    }else{
                        Swal.fire({
                            icon: 'success',
                            title: 'Congrautions, coupon discount '+response.coupon.coupon_discount+'% added',
                        });
                        window.location.reload();
                    }
                }

            })
        }
    }

// -----------end for coupon-------------
    $('document').ready(function(){
        $('.qtyInput').on('change',function(){
            let quantity = $(this).val();
            let id = $(this).attr('id');
            $.ajax({
                url: "{{ route('frontend#updateCart') }}",
                method: "post",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity,
                },
                success:function(response){

                    if(response.error){
                        Swal.fire({
                            icon: 'error',
                            title: response.error,
                        });
                    }else{
                        Swal.fire({
                            icon: 'success',
                            title: response.success,
                        });

                    }
                    window.location.reload();
                }

            })
        })
    })
</script>
@endsection
