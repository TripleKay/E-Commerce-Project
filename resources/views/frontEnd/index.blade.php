@extends('frontEnd.layouts.app')
@section('content')
<!-- -------------------------------banner------------------------------------  -->
<section class=" py-4">
    <div class="container">
        <div class="row banner-container bg-white p-3 rounded mx-auto owl-carousel owl-theme">
            <a href="#" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner1.png')}}"  class="banner-img" alt="" srcset="">
                <!-- <div class="card bg-white p-3 border-0 banner-content position-absolute">
                    <div class="card-body">
                        <h3>Hello banner</h3>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae rem possimus deserunt omnis reprehenderit.</p>
                        <a href="" class="btn btn-dark btn-lg shadow-lg">Shop Now</a>
                    </div>
                </div> -->
            </a>
            <a href="#footer-section" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner4.png')}}"  class="banner-img" class="banner-img" alt="" srcset="">
                <!-- <div class="card bg-white p-3 border-0 banner-content position-absolute">
                    <div class="card-body">
                        <h3>Hello banner</h3>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae rem possimus deserunt omnis reprehenderit.</p>
                        <a href="" class="btn btn-dark btn-lg shadow-lg">Shop Now</a>
                    </div>
                </div> -->
            </a>
            <a href="#" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner2.png')}}"  class="banner-img" class="banner-img" alt="" srcset="">
                <!-- <div class="card bg-white p-3 border-0 banner-content position-absolute">
                    <div class="card-body">
                        <h3>Hello banner</h3>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae rem possimus deserunt omnis reprehenderit.</p>
                        <a href="" class="btn btn-dark btn-lg shadow-lg">Shop Now</a>
                    </div>
                </div> -->
            </a>
            <a href="#" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner3.png')}}"  class="banner-img" class="banner-img" alt="" srcset="">
                <!-- <div class="card bg-white p-3 border-0 banner-content position-absolute">
                    <div class="card-body">
                        <h3>Hello banner</h3>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae rem possimus deserunt omnis reprehenderit.</p>
                        <a href="" class="btn btn-dark btn-lg shadow-lg">Shop Now</a>
                    </div>
                </div> -->
            </a>
        </div>
    </div>
</section>
<!-- -------------------------------caategory-------------------------------------  -->
<section class="py-4" id="category-section">
    <div class="container">
        <div class="row">
            <!-- category box  -->
            <div class="col-4 col-md-3">
                <div class="card cat-box mb-3 mb-sm-3 mb-md-0">
                    <img src="resources/image/cat1.png" class="cat-img" alt="" srcset="">
                    <div class="cat-title p-3">
                        <h5 class="text-white">Electronics</h5>
                    </div>
                </div>
            </div>
            <!-- category box  -->
            <div class="col-4 col-md-3">
                <div class="card cat-box mb-3 mb-sm-3 mb-md-0">
                    <img src="resources/image/cat2.png" class="cat-img" alt="" srcset="">
                    <div class="cat-title p-3">
                        <h5 class="text-white">Home & Lifestyle</h5>
                    </div>
                </div>
            </div>
            <!-- category box  -->
            <div class="col-4 col-md-3">
                <div class="card cat-box mb-3 mb-sm-3 mb-md-0">
                    <img src="resources/image/home-banner1.jpg" class="cat-img" alt="" srcset="">
                    <div class="cat-title p-3">
                        <h5 class="text-white">Fashion</h5>
                    </div>
                </div>
            </div>
            <!-- category box  -->
            <div class="col-4 col-md-3">
                <div class="card cat-box mb-3 mb-sm-3 mb-md-0">
                    <img src="resources/image/home-2-banner-3.jpg" class="cat-img" alt="" srcset="">
                    <div class="cat-title p-3">
                        <h5 class="text-white">Organics</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- -------------------------------products carusal-------------------------------------  -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h4 class="mb-0 product-section-title">New Arrivals</h4>
                    <a href="" class="btn btn-light shadow-sm text-primary">View All</a>
                </div>
            </div>
        </div>
        <div class="row product-container mx-auto owl-carousel owl-theme">
            <!-- -----------------------product item ------------------------------- -->
            @foreach ($newProduct as $item)

            <div class="item me-3 my-5">
                <div class="card bg-white product-card p-3">
                        <div class="product-img-container">
                            <img src="{{ asset('uploads/products/'.$item->preview_image) }}" alt="" srcset="">
                            @if (!empty($item->discount_price))
                                <div class="product-discount bg-danger">
                                    <p class="mb-0 text-white">30%</p>
                                </div>
                            @else
                                <div class="product-discount bg-dark">
                                    <p class="mb-0 text-white">New</p>
                                </div>
                            @endif
                            <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                                <a href="detail.html" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
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
            <!-- -----------------------product item ------------------------------- -->

        </div>
    </div>
</section>
<!-- -------------------------------products carusal 2-------------------------------------  -->
{{-- <section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h4 class="mb-0 product-section-title">Featured Products</h4>
                    <a href="" class="btn btn-light shadow-sm text-primary">View All</a>
                </div>
            </div>
        </div>
        <div class="row product-container mx-auto owl-carousel owl-theme">
            <!-- -----------------------product item ------------------------------- -->
            <div class="item me-3 my-5">
                <div class="card bg-white product-card p-3">
                        <div class="product-img-container">
                            <img src="resources/image/product4.jpg" alt="" srcset="">
                            <div class="product-discount bg-danger">
                                <p class="mb-0 text-white">30%</p>
                            </div>
                            <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to cart" style="width: 40px; height: 40px;"><i class="mx-auto fa fa-shopping-cart text-primary" style="font-size: 25px;"></i></a>
                            </div>
                        </div>
                    <div class="card-body px-0 pb-0">
                        <h5>Apple Iphone 11 Pro</h5>
                        <div class="d-flex align-items-baseline">
                            <h6 class="mb-0 text-danger">500000 MMK</h6>
                            <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">550000 MMK</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -----------------------product item ------------------------------- -->
            <div class="item me-3 my-5">
            <div class="card bg-white product-card p-3">
                    <div class="product-img-container">
                        <img src="resources/image/product3.jpg" alt="" srcset="">
                        <div class="product-discount bg-danger">
                            <p class="mb-0 text-white">30%</p>
                        </div>
                        <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                            <a href="" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
                            <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></a>
                            <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to cart" style="width: 40px; height: 40px;"><i class="mx-auto fa fa-shopping-cart text-primary" style="font-size: 25px;"></i></a>
                        </div>
                    </div>
                <div class="card-body px-0 pb-0">
                    <h5>Apple Iphone 11 Pro</h5>
                    <div class="d-flex align-items-baseline">
                        <h6 class="mb-0 text-danger">500000 MMK</h6>
                        <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">550000 MMK</p>
                    </div>
                </div>
            </div>
            </div>
            <!-- -----------------------product item ------------------------------- -->
            <div class="item me-3 my-5">
                <div class="card bg-white product-card p-3">
                        <div class="product-img-container">
                            <img src="resources/image/product2.jpg" alt="" srcset="">
                            <div class="product-discount bg-danger">
                                <p class="mb-0 text-white">30%</p>
                            </div>
                            <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to cart" style="width: 40px; height: 40px;"><i class="mx-auto fa fa-shopping-cart text-primary" style="font-size: 25px;"></i></a>
                            </div>
                        </div>
                    <div class="card-body px-0 pb-0">
                        <h5>Apple Iphone 11 Pro</h5>
                        <div class="d-flex align-items-baseline">
                            <h6 class="mb-0 text-danger">500000 MMK</h6>
                            <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">550000 MMK</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -----------------------product item ------------------------------- -->
            <div class="item me-3 my-5">
                <div class="card bg-white product-card p-3">
                        <div class="product-img-container">
                            <img src="resources/image/product1.jpg" alt="" srcset="">
                            <div class="product-discount bg-danger">
                                <p class="mb-0 text-white">30%</p>
                            </div>
                            <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to cart" style="width: 40px; height: 40px;"><i class="mx-auto fa fa-shopping-cart text-primary" style="font-size: 25px;"></i></a>
                            </div>
                        </div>
                    <div class="card-body px-0 pb-0">
                        <h5>Apple Iphone 11 Pro</h5>
                        <div class="d-flex align-items-baseline">
                            <h6 class="mb-0 text-danger">500000 MMK</h6>
                            <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">550000 MMK</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -----------------------product item ------------------------------- -->
            <div class="item me-3 my-5">
                <div class="card bg-white product-card p-3">
                        <div class="product-img-container">
                            <img src="resources/image//product5.jpeg" alt="" srcset="">
                            <div class="product-discount bg-danger">
                                <p class="mb-0 text-white">30%</p>
                            </div>
                            <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></a>
                                <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to cart" style="width: 40px; height: 40px;"><i class="mx-auto fa fa-shopping-cart text-primary" style="font-size: 25px;"></i></a>
                            </div>
                        </div>
                    <div class="card-body px-0 pb-0">
                        <h5>Apple Iphone 11 Pro</h5>
                        <div class="d-flex align-items-baseline">
                            <h6 class="mb-0 text-danger">500000 MMK</h6>
                            <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">550000 MMK</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> --}}
<!-- -------------------------------brand slider-------------------------------------  -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="row brand-container my-5 mx-auto owl-carousel owl-theme">
                @foreach ($brands as $item)
                    <div class="item">
                        <img src="{{ asset('uploads/brands/'.$item->image) }}" class="brand-img" alt="" srcset="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
