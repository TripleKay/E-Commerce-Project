@extends('frontEnd.layouts.app')
@section('content')
<section class="py-4 min-vh-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb d-flex align-items-center ">
                        <li class="breadcrumb-item"><a href="{{ URL::previous() }}" class="btn btn-dark btn-sm"><i class="fa fa-chevron-left"></i> Back</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('frontend#index') }}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('frontend#viewCarts') }}">My Carts</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Checkout
                      </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="border-0 card">
                    <div class="bg-transparent card-header ">
                        <h5 class="my-2">Delivery Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user#createOrder') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="border-0 card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Full Name</label>
                                                <input name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="enter your name" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="enter your email" required >
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Phone Number</label>
                                                <input name="phone" type="number" class="form-control" value="{{ old('phone') }}" placeholder="enter your phone number" required>
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Note</label>
                                                <textarea name="note" class="form-control" id="" rows="3" placeholder="say something....">{{ old('note') }}</textarea>
                                                @error('note')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-0 card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Region</label>
                                                <select name="stateDivisionId" id="" class="stateDivisionsOption form-control" required>
                                                    <option value="">----Select Region----</option>
                                                    @foreach ($stateDivisions as $item)
                                                        <option value="{{ $item->state_division_id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('stateDivisionId')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">City</label>
                                                <select name="cityId" id="" class="cityOption form-control" disabled>
                                                    <option value="">----Select City----</option>
                                                </select>
                                                @error('cityId')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Township</label>
                                                <select name="townshipId" id="" class="townshipOption form-control" disabled>
                                                    <option value="">----Select Township----</option>
                                                </select>
                                                @error('townshipId')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="" class="form-label">Full Address</label>
                                                <input name="address" type="text" class="form-control" value="{{ old('address') }}" placeholder="enter your full address" required>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 card">
                                                <div class="bg-transparent card-header">
                                                    <h5>Select Payment Method</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-check" style="">
                                                        <div class="p-1">
                                                            <input class="form-check-input" name="paymentMethod" value="kpay" type="radio" id="flexRadioDefault1">
                                                            <label class="form-check-label d-flex" for="flexRadioDefault1">
                                                            <img src="{{ asset('frontEnd/resources/image/kpay.png') }}" alt="" srcset="" class="rounded" style="width: 60px">
                                                            <span class="ms-2">KPay</span>
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-check" style="">
                                                        <div class="p-1">
                                                            <input class="form-check-input" name="paymentMethod" value="wave" type="radio" id="flexRadioDefault2">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                <img src="{{ asset('frontEnd/resources/image/warvemoney.png') }}" alt="" srcset="" class="rounded" style="width: 60px">
                                                                <span class="ms-2">Wave Money</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('paymentMethod')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-0 card">
                                        <div class="card-body">

                                            @if (Session::has('coupon'))
                                                <div class="p-3 mb-3 border-0 rounded applyCouponBox card bg-light">
                                                    <div class="mb-3 d-flex justify-content-between">
                                                        <p class="mb-0">Your Coupon :</p>
                                                        <h6 class="mb-0">{{ Session::get('coupon')['couponCode'] }}</h6>
                                                    </div>
                                                    <div class="d-flex justify-content-between ">
                                                        <p class="mb-0">Coupon Discount(%) :</p>
                                                        <h6 class="mb-0">-{{ Session::get('coupon')['couponDiscount'] }}%</h6>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="mb-3 border-0 rounded applyCouponBox card">
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
                                            @php
                                                $subTotal = Session::has('subTotal') ? Session::get('subTotal') : '0';
                                                $couponDiscount = Session::has('coupon') ? Session::get('coupon')['couponDiscount'] : '0';
                                                $discountAmount = round($subTotal * $couponDiscount/100);
                                                $GrandTotal = $subTotal - $discountAmount;
                                            @endphp
                                            <div class="py-3 border-0 card bg-light">
                                                <div class="card-body">
                                                    <div class="mb-3 d-flex justify-content-between">
                                                        <h6 class="mb-0">Sub Total :</h6>
                                                        <h5 class="mb-0">{{$subTotal}} Ks</h5>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-0">Coupon Discount :</h6>
                                                        <h5 class="mb-0 couponDiscount">-{{ $discountAmount }} Ks</h5>
                                                    </div>
                                                    <hr>
                                                    <div class="mb-3 d-flex justify-content-between">
                                                        <h6 class="mb-0">Grand Total :</h6>
                                                        <h5 class="mb-0">{{ $GrandTotal }} Ks</h5>
                                                    </div>
                                                    <hr>
                                                    <button type="submit"  class="mt-3 text-white shadow btn btn-primary float-end btn-lg">Place Order</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4 row">
            <div class="col-12">
                <div class="border-0 card">
                    <div class="bg-white card-header">
                        <h5 class="my-2">Your Orders</h5>
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
                                            $total = 0;
                                        @endphp
                                        @foreach (Session::get('cart') as $key => $item)
                                            @php
                                                $total += $item['price'] * $item['quantity']
                                            @endphp
                                            <tr class="text-center">
                                                <td class="align-middle">{{ $i++ }}</td>
                                                <td class="align-middle">
                                                    <img src="{{ asset('uploads/products/'.$item['productImage']) }}" alt="" srcset="" style="width: 100px; heigth: 100px">
                                                </td>
                                                <td class="align-middle text-start">{{ $item['productName'] }}</td>
                                                <td class="align-middle">{{ empty($item['color']) ? '.....' : $item['color'] }}</td>
                                                <td class="align-middle">{{ empty($item['size']) ? '.....' : $item['size'] }}</td>
                                                <td class="align-middle">{{ $item['price'] }} Ks</td>
                                                <td class="align-middle">
                                                    <div class="px-3 py-1 rounded bg-light d-inline-block">{{ $item['quantity'] }}</div>
                                                </td>
                                                <td class="align-middle">{{ $item['price'] * $item['quantity'] }} Ks</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('frontend#deleteCart',$key) }}" class="text-white btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-end">
                                            <td colspan="9">
                                                <h5>Sub Total : {{$total}} Ks</h5>
                                            </td>
                                        </tr>
                                    </tfoot>
                                @else
                                    <tbody>
                                        <tr class="text-center text-danger">
                                            <td colspan="9" class="py-3 ">
                                                There is No Carts
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                            <div class="my-2 float-end">
                                <a href="{{ route('frontend#allProduct') }}" class=" btn btn-dark"><i class="fa fa-chevron-left"></i> Continous Shopping</a>
                                {{-- <a href="{{ route('user#checkout') }}" class="text-white ms-3 btn btn-primary">Proceed To Checkout</a> --}}
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
    $('document').ready(function(){
        $('.stateDivisionsOption').on('change',function(){
            let stateDivisionId = $(this).val();
            // alert(stateDivisionId);
            $.ajax({
                url: "{{ route('user#getCity') }}",
                method: "post",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: stateDivisionId,
                },
                beforeSend:function(){
                    $('.cityOption').prop("disabled", false);
                    $('.cityOpiton').html('<option>-----Loading-----</option>');
                },
                success:function(response){
                    let cityHtml = "<option>-----Select City-----</option>";
                    for(let i= 0; i < response.cities.length; i++){
                        cityHtml += `<option value="${response.cities[i].city_id}">${response.cities[i].name}</option>`;
                    };
                    $('.cityOption').html(cityHtml);
                    $('.townshipOption').html("<option>-----Select Township-----</option>");

                }
            })
        })
        $('.cityOption').on('change',function(){
            let cityId = $(this).val();
            $.ajax({
                url: "{{ route('user#getTownship') }}",
                method: "post",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: cityId,
                },
                beforeSend:function(){
                    $('.townshipOption').prop("disabled", false);
                    $('.townshipOpiton').html('<option>-----Loading-----</option>');
                },
                success:function(response){
                    let townshipHtml = "<option>-----Select Township-----</option>";
                    for(let i= 0; i < response.townships.length; i++){
                        townshipHtml += `<option value="${response.townships[i].township_id}">${response.townships[i].name}</option>`;
                    };
                    $('.townshipOption').html(townshipHtml);
                }
            })
        })
    })
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
                        // $('.couponDiscount').text(response.coupon.coupon_discount+'%');
                        window.location.reload();


                        Swal.fire({
                            icon: 'success',
                            title: 'Congrautions, coupon discount '+response.coupon.coupon_discount+'% added',
                        });
                    }
                }

            })
        }
    }

// -----------end for coupon-------------


</script>
@endsection
