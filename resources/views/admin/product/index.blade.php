@extends('admin.layouts.app')
@section('content')
<div class="row pt-4">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row pb-4">
    <div class="col-12">
        <div class="card rounded" style="box-shadow: none !important">
            <div class="card-header">
               <div class="d-flex align-items-center justify-content-between my-1">
                    <h4 class="mb-0">All Products</h4>
                    <a href="{{ route('admin#createProduct') }}" class="btn btn-primary mb-0 shadow btn"><i class="fas fa-plus-circle text-white mr-2"></i> Add Product</a>
               </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead class="bg-primary text-nowrap">
                          <tr>
                            <th>#</th>
                            <th>Preview Image</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Sub-SubCategory</th>
                            <th>Variants</th>
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Publish Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $item->product_id}}</th>
                                    <td>
                                        <img src="{{ asset('uploads/products').'/'.$item->preview_image }}" class="rounded shadow-sm" alt="" srcset="" style="width: 90px; height: 90px;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->brand->name }}</td>
                                    <td>{{ $item->category->name}}</td>
                                    <td>{{ $item->subcategory->name }}</td>
                                    <td>{{ $item->subsubcategory->name }}</td>
                                    <td>
                                        @if (!$item->totalVariants == 0)
                                            <a href="{{ route('admin#createVariant',$item->product_id) }}" class="text-danger " style="text-decoration: underline">{{ $item->totalVariants }}</a>
                                        @else
                                            {{ $item->totalVariants }}
                                        @endif
                                    </td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->discount_price }}</td>
                                    <td>{{ $item->publish_status }}</td>
                                    <td class="text-wrap">
                                        <a href="{{ route('admin#showProduct',$item->product_id) }}" class="btn btn-info btn-sm mb-2"><i class="fas fa-eye "></i></a>
                                        <a href="{{ route('admin#editProduct',$item->product_id) }}" class="btn btn-success btn-sm mb-2"><i class="fas fa-edit "></i></a>
                                        <a href="{{ route('admin#deleteProduct',$item->product_id) }}" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash "></i></a>
                                        <a href="{{ route('admin#createVariant',$item->product_id) }}" class="btn btn-dark btn-sm mb-2"><i class="fas fa-plus-circle mr-2"></i>Add Variants</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
