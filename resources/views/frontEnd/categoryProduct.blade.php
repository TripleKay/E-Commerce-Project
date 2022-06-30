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
            <div class="col-3">
                <div class="card min-vh-100 border-0">
                    <div class="card-body">
                        <h3>filter</h3>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card min-vh-100 border-0 bg-transparent">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($products as $item)
                            <div class="col-4">
                                <div class="card bg-white product-card p-3 mb-3">
                                        <div class="product-img-container">
                                            <img src="{{ asset('uploads/products/'.$item->preview_image) }}" alt="" srcset="" class="d-block w-100">
                                            @if (!empty($item->discount_price))
                                            @php
                                                $amount = $item->discount_price / $item->selling_price;
                                                $percentage = round($amount*100);
                                            @endphp
                                                <div class="product-discount bg-danger">
                                                    <p class="mb-0 text-white">-{{ $percentage }}%</p>
                                                </div>
                                            @else
                                                <div class="product-discount bg-dark">
                                                    <p class="mb-0 text-white">New</p>
                                                </div>
                                            @endif
                                            <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                                                <a href="{{ route('frontend#showProduct',$item->product_id) }}" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
                                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></a>
                                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to cart" style="width: 40px; height: 40px;"><i class="mx-auto fa fa-shopping-cart text-primary" style="font-size: 25px;"></i></a>
                                            </div>
                                        </div>
                                    <div class="card-body px-0 pb-0">
                                        <h5>{{ $item->name }}</h5>
                                        <div class="d-flex align-items-baseline">
                                            @if (!empty($item->discount_price))
                                                <h6 class="mb-0 text-danger">{{ $item->selling_price - $item->discount_price }} Ks</h6>
                                            @else
                                                <h6 class="mb-0 text-danger">{{ $item->selling_price }} Ks</h6>
                                            @endif
                                            @if (!empty($item->discount_price))
                                                <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">{{ $item->selling_price }} Ks</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
