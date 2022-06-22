@extends('frontEnd.layouts.app')
@section('content')
<!-- -------------------------------product details------------------------------------  -->
    <section class="pt-4">
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
                    <div class="row bg-white">
                        <div class="col-5 col-md-4 col-lg-4">
                            <div class="card rounded border-0">
                                <div class="card-body px-4">
                                    <div class="big-img overflow-hidden mb-4">
                                        {{-- preview image --}}
                                        <img src="{{ asset('uploads/products/'.$product->preview_image) }}" class="img-fluid" alt="" srcset="">
                                    </div>
                                    @if (!count($multiImages) == 0)
                                    <div class="row small-img-slider position-relative owl-carousel owl-theme m-auto">
                                        @foreach ($multiImages as $item)
                                            <div class="item">
                                                <div class="overflow-hideen mx-1 small-img">
                                                    <img src="{{ asset('uploads/products/'.$item->image)}}" class="" alt="" srcset="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-7 col-md-8 col-lg-8">
                            <div class="card rounded border-0">
                                <div class="card-body">
                                    <h5>{{ $product->name }}</h5>
                                    <hr>
                                    <p>Avaliable : <span class="text-danger">In Stock</span></p>
                                    <p class="text-black-50">{{ $product->short_description }}</p>
                                    <hr>
                                    @if (!empty($product->discount_price))
                                        @php
                                            $amount = $product->discount_price / $product->selling_price;
                                            $percentage = round($amount*100);
                                        @endphp
                                        <p class="">Discount : <span class=""> {{$percentage}} %</span></p>
                                        <hr>
                                    @endif
                                    @if (!$colors->count() == 0)
                                        <div class="d-flex">
                                            @foreach ($colors as $item)
                                                <div class="me-2" style="background-color: {{ $item->colorName }};width: 40px; height: 40px; border: 1px solid #888">
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                    @endif
                                    @if (!$sizes->count() == 0)
                                        <div class="d-flex">
                                            @foreach ($sizes as $item)
                                                <div class="me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border: 1px solid #888">
                                                    {{ $item->sizeName }}
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                    @endif
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Quantity : </p>
                                        <div class="d-flex p-1 rounded" style="width: 150px ;">
                                            <button class="btn btn-dark">+</button>
                                            <input type="number" class="form-control" placeholder="qty" value="1">
                                            <button class="btn btn-dark">-</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex align-items-baseline">
                                        @if (!empty($product->discount_price))
                                            <h5 class="mb-0 text-danger">{{ $product->selling_price - $product->discount_price }} Ks</h5>
                                        @else
                                            <h5 class="mb-0 text-danger">{{ $product->selling_price }} Ks</h5>
                                        @endif
                                        @if (!empty($product->discount_price))
                                            <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">{{ $product->selling_price }} Ks</p>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="mt-4">
                                        <button class="btn btn-danger me-3 text-white">Buy Now</button>
                                        <button class="btn btn-primary text-white">Add to Cart</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 border-0">
                        <div class="card-body">
                            <h5>Product Details</h5>
                            <hr>
                            <p class="text-black-50">{{ $product->long_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
