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
                                            <select name="" id="" class="form-control">
                                                <option value="">----Select Region----</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">City</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">----Select City----</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Township</label>
                                            <select name="" id="" class="form-control">
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
                                                    <h5 class="mb-0">500000 Ks</h5>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-0">Coupon Discount :</h6>
                                                    <h5 class="mb-0">50 %</h5>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <h6 class="mb-0">Grand Total :</h6>
                                                    <h5 class="mb-0">250000 Ks</h5>
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
