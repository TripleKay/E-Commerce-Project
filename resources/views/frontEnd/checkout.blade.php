@extends('frontEnd.layouts.app')
@section('content')
<section class="min-vh-100 py-4">
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
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-header bg-transparent border-0">
                        <h5>Delivery Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" placeholder="enter your name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="enter your name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" placeholder="enter your name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Note</label>
                                            <textarea name="" class="form-control" id="" rows="3" placeholder="say something...."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Region</label>
                                            <select name="" id="" class="stateDivisionsOption form-control">
                                                <option value="">----Select Region----</option>
                                                @foreach ($stateDivisions as $item)
                                                    <option value="{{ $item->state_division_id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">City</label>
                                            <select name="" id="" class="cityOption form-control" disabled>
                                                <option value="">----Select City----</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Township</label>
                                            <select name="" id="" class="townshipOption form-control" disabled>
                                                <option value="">----Select Township----</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="" class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="enter your name">
                                        </div>
                                        <div class="mb-3 card">
                                            <div class="card-header bg-transparent">
                                                <h5>Select Payment Method</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Stripe Payment
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Cash On Delivery
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="card border-0 rounded mb-3">
                                            <div class="">
                                                <h5>Discount Code</h5>
                                                <p class="text-black-50">Enter your coupon code if you have one.....</p>
                                            </div>
                                            {{-- <hr> --}}
                                            <div class="">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <input type="text" class="form-control" placeholder="enter your coupon...">
                                                    <button class="btn btn-outline-primary text-nowrap ms-2">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 bg-light py-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <h6 class="mb-0">Total :</h6>
                                                    <h5 class="mb-0">0 Ks</h5>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-0">Coupon Discount :</h6>
                                                    <h5 class="mb-0">0 %</h5>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <h6 class="mb-0">Grand Total :</h6>
                                                    <h5 class="mb-0">0 Ks</h5>
                                                </div>
                                                <hr>
                                                <button class="btn btn-primary mt-3 float-end text-white shadow btn-lg">Place Order</button>
                                            </div>
                                        </div>

                                    </div>
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
                        $('.couponDiscount').text(response.coupon.coupon_discount+'%');
                        showGrandTotalBox();
                        Swal.fire({
                            icon: 'success',
                            title: 'Congrautions, coupon discount '+response.coupon.coupon_discount+'% added',
                        });
                    }
                }

            })
        }
    }

    function showGrandTotalBox(){
        $.ajax({
                url: "{{ route('user#showGrandTotal') }}",
                method: "get",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success:function(response){
                    let grandTotalBox = '';
                    if(response.coupon == 'yes'){
                        grandTotalBox = `
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="mb-0">Total : </h6>
                                    <h5 class="mb-0">${response.subTotal} Ks</h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0">Coupon Discount :</h6>
                                    <h5 class="mb-0 couponDiscount">${response.couponDiscount} %</h5>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="mb-0">Grand Total :</h6>
                                    <h5 class="mb-0">${response.grandTotal} Ks</h5>
                                </div>
                                <hr>
                                <a href="{{ route('user#checkout') }}" class="btn btn-primary mt-3 float-end text-white">Proceed to Checkout</a>
                            </div>
                        `;

                    }else{
                        grandTotalBox = `
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="mb-0">Total : </h6>
                                    <h5 class="mb-0">${response.subTotal ? response.subTotal : '0'} Ks</h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0">Coupon Discount :</h6>
                                    <h5 class="mb-0 couponDiscount">0 %</h5>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="mb-0">Grand Total :</h6>
                                    <h5 class="mb-0">${response.subTotal ? response.subTotal : '0'} Ks</h5>
                                </div>
                                <hr>
                                <a href="{{ route('user#checkout') }}" class="btn btn-primary mt-3 float-end text-white">Proceed to Checkout</a>
                            </div>
                        `;
                    }
                    $('.grandTotalBox').html(grandTotalBox);
                }
            })
    }
// -----------end for coupon-------------


</script>
@endsection
