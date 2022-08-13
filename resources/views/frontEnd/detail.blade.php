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
                                        <div class="form-group">
                                            <select name="" id="" class="colorOption form-control" style="width: 200px" required>
                                                <option value="">---select color---</option>
                                                @foreach ($colors as $item)
                                                    <option value="{{ $item->color_id }}">{{ $item->colorName }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger colorErrorMessage d-none">Color is required!</small>
                                        </div>
                                        <hr>
                                    @endif
                                    @if (!$sizes->count() == 0)
                                    <div class="form-group">
                                        <select name="" id="" class="sizeOption form-control" style="width: 200px">
                                            <option value="">---select size---</option>
                                            @foreach ($sizes as $item)
                                                <option value="{{ $item->size_id }}">{{ $item->sizeName }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger sizeErrorMessage d-none">Size is required!</small>
                                    </div>
                                        <hr>
                                    @endif
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Quantity : </p>
                                        <div class="d-flex p-1 rounded" style="width: 150px ;">
                                            <input type="number" class="quantity form-control" placeholder="qty" value="1" max="10" min="1">
                                        </div>
                                    </div>
                                    <small class="text-danger qtyErrorMessage d-none">quantity must be min: 1 or max: 10</small>
                                    <hr>
                                    <div class="d-flex align-items-baseline">
                                        @php
                                            $price = !empty($product->discount_price) ? $product->selling_price - $product->discount_price : $product->selling_price;
                                        @endphp
                                            <h5 class="mb-0 text-danger">SubTotal : {{ $price }} Ks</h5>
                                        @if (!empty($product->discount_price))
                                            <p class="h6 mb-0 ms-2 text-black-50 text-decoration-line-through">{{ $product->selling_price }} Ks</p>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="mt-4">
                                        <button class="addToCart btn btn-primary text-white" onclick="addToWishList({{ $product->product_id }})">Add to WishList</button>
                                        <button class="addToCart btn btn-danger text-white" onclick="addToCart({{$product->product_id}},{{ $price }})">Add to Cart</button>
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
@section('script')
<script>
    $('document').ready(function(){
        //get size
        $('.colorOption').on('click',function(){
            let productId = "{{ $product->product_id }}";
            let colorId = $(this).val();
            $.ajax({
                url: "{{ route('frontend#getProductSize') }}",
                method: "post",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    colorId: colorId,
                    productId: productId,
                },
                beforeSend:function(){
                    let sizeOptionHtml = '<option value="">----loading----</option>';
                    $('.sizeOption').html(sizeOptionHtml);
                },
                success:function(response){
                    if(response.sizes.length != 0){
                        let sizeOptionHtml = '';
                        for(let i =0 ; i < response.sizes.length ; i++){
                            sizeOptionHtml += `
                                <option value="${response.sizes[i].size_id}">${response.sizes[i].sizeName}</option>
                            `;
                        }
                        $('.sizeOption').html(sizeOptionHtml);
                    }
                }

            })
        })
    })
</script>
@endsection
