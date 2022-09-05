@extends('frontEnd.layouts.app')
@section('style')
 <style>
    .moreProductLoader{
        display: none;
    }
    /* .loadMoreBtn::before{
        content: '';
        display: inline-block;
        width: 100%;
        height: 3px;
        background-color: var(--bs-dark);
    } */
 </style>
@endsection
@section('content')
<!-- -------------------------------banner------------------------------------  -->
<section class=" py-4">
    <div class="container">
        <div class="row banner-container bg-white p-3 rounded mx-auto owl-carousel owl-theme">
            <a href="#" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner2.png')}}"  class="banner-img" alt="" srcset="">
            </a>
            <a href="#footer-section" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner4.png')}}"  class="banner-img" class="banner-img" alt="" srcset="">
            </a>
            <a href="#" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner2.png')}}"  class="banner-img" class="banner-img" alt="" srcset="">
            </a>
            <a href="#" class="banner-slider position-relative item">
                <img src="{{ asset('frontEnd/resources/image/banner3.png')}}"  class="banner-img" class="banner-img" alt="" srcset="">
            </a>
        </div>
    </div>
</section>
<!-- -------------------------------caategory-------------------------------------  -->
{{-- <section class="py-4" id="category-section">
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
</section> --}}
<!-- -------------------------------products carusal-------------------------------------  -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h4 class="mb-0 product-section-title bg-dark px-3 py-2 text-white rounded-top">New Product</h4>
                        {{-- <a href="{{ route('frontend#allProduct') }}" class="btn">View All <i class="fas fa-chevron-right"></i></a> --}}
                    </div>
                    <div class="bg-dark" style="width: 100%;height: 2px;"></div>
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
                                <button onclick="addToWishList({{ $item->product_id }})" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></button>
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
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h4 class="mb-0 product-section-title bg-dark px-3 py-2 text-white rounded-top">Just For You</h4>
                        <a href="{{ route('frontend#allProduct') }}" class="btn">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="bg-dark" style="width: 100%;height: 2px;"></div>
                </div>
            </div>
        </div>
        <div class="row productContainer">
            <!-- -----------------------product item ------------------------------- -->
            @foreach ($products as $item)

            <div class="col-3">
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
                                <button onclick="addToWishList({{ $item->product_id }})" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></button>
                {{-- <a href="" class="btn btn-light mx-3 px-1 shadow" title="add to cart" style="width: 40px; height: 40px;"><i class="mx-auto fa fa-shopping-cart text-primary" style="font-size: 25px;"></i></a> --}}
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
        <div class="row moreProductLoader">
            <div class="col-12 d-flex justify-content-center align-items-center" style="min-height: 400px">
                <div class="spinner-grow ms-2 text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow ms-2 text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow ms-2 text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow ms-2 text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="spinner-grow ms-2 text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mt-4 d-flex justify-content-between w-100 align-items-center">
                    <div class="bg-dark" style="width: 100%; height: 2px;"></div>
                    <button class="btn btn-primary text-nowrap text-white loadMoreBtn" onclick="loadMore()">Load More</button>
                    <div class="bg-dark" style="width: 100%; height: 2px;"></div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- -------------------------------brand slider-------------------------------------  -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="row brand-container bg-white my-5 mx-auto owl-carousel owl-theme py-3" style="border-radius: 10px">
                @foreach ($brands as $item)
                    <div class="item">
                        <img src="{{ asset('uploads/brands/'.$item->image) }}" class="brand-img mx-auto" alt="" srcset="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    function showDiscountBadge(discountPrice,sellingPrice){
        let discountBadgeHtml = '';
        if(discountPrice && discountPrice != 0){
            //has discount
            let amount = discountPrice / sellingPrice;
            let percentage = parseInt(amount*100);
            discountBadgeHtml = ` <div class="product-discount bg-danger">
                                    <p class="mb-0 text-white">-${percentage} %</p>
                                </div>`;
        }
        return discountBadgeHtml;
    }

    function showProductPrice(discountPrice,sellingPrice){
        let productPriceHtml = '';
        if(discountPrice && discountPrice != 0){
            productPriceHtml = `
                <h6 class="mb-0 text-danger">${sellingPrice - discountPrice} Ks</h6>
                <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">${sellingPrice} Ks</p>
            `;
        }else{
            productPriceHtml = `
            <h6 class="mb-0 text-danger">${sellingPrice} Ks</h6>
            `;
        }
        return productPriceHtml;
    }

    function loadMoreProducts(page){
        $.ajax({
            url: "{{ url('/') }}"+"/?page="+page,
            method: "GET",
            dataType: "json",
            beforeSend:function(){
                //show loading
                $('.moreProductLoader').show();
            },
            success:function(response){
                if(response.products.data.length){
                    let productsHtml = '';
                    for(let i=0; i < response.products.data.length ; i++){
                        productsHtml += `
                        <div class="col-3">
                            <div class="card bg-white product-card p-3 mb-3">
                                    <div class="product-img-container">
                                        <img src="{{ asset('uploads/products/') }}/${response.products.data[i].preview_image}" alt="" srcset="" class="d-block w-100">
                                        ${showDiscountBadge(response.products.data[i].discount_price,response.products.data[i].selling_price)}
                                        <div class="d-flex product-overlay py-2 justify-content-center align-items-center">
                                            <a href="{{ route('frontend#showProduct','') }}/${response.products.data[i].product_id}" class="btn btn-light mx-3 px-1 shadow" title="view details" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-eye text-info" style="font-size: 25px;"></i></a>
                                            <button onclick="addToWishList(${response.products.data[i].product_id})" class="btn btn-light mx-3 px-1 shadow" title="add to wishlists" style="width: 40px; height: 40px;"><i class="mx-auto fas fa-heart text-danger" style="font-size: 25px;"></i></button>

                                        </div>
                                    </div>
                                <div class="card-body px-0 pb-0">
                                    <h5>${response.products.data[i].name}</h5>
                                    <div class="d-flex align-items-baseline">
                                        ${showProductPrice(response.products.data[i].discount_price,response.products.data[i].selling_price)}
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    }
                    $('.productContainer').append(productsHtml);
                    $('.moreProductLoader').hide();
                }else{
                    $('.moreProductLoader').hide();
                    $('.loadMoreBtn').hide();
                }
            }

        });
    }

    let pageNumber = 1;
    function loadMore(){
        pageNumber++;
        loadMoreProducts(pageNumber);
    }
</script>
@endsection
