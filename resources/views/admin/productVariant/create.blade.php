@extends('admin.layouts.app')
@section('content')
<div class="row pt-4">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin#product')}}">Products</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin#product')}}">Product Variant</a></li>
              <li class="breadcrumb-item active" aria-current="page">add</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row pb-4">
    <div class="col-4">
        <div class="card shadow-none rounded">
            <div class="card-header">
                <h4 class="">Create <span class="text-primary">{{ $product->name }}</span> Variants</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin#storeVariant',$product->product_id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Color</label>
                        <select name="colorId" class="form-control" id="">
                            <option value="">----- select colors ------</option>
                            @foreach ($colors as $item)
                                <option value="{{ $item->color_id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('colorId')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Size</label>
                        <select name="sizeId" class="form-control" id="">
                            <option value="">----- select size ------</option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->size_id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('sizeId')
                                <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input name="avaiStock" type="number" class="form-control" placeholder="available stock">
                        @error('avaiStock')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-primary shadow mt-3">Add Variant</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        @include('admin.productVariant.list')
    </div>
</div>
@endsection
{{-- @section('script')
   <script>
    $(document).ready(function(){

        let count = 1;
        function addRow(count){
            let rowHtml = "";
            rowHtml += `
                    <tr rowId="${count}" class="variantRow">
                        <td>${count}</td>
                        <td>
                            <select name="colorId[]" class="form-control" id="">
                                <option value="">----- select color-----</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->product_id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="sizeId[]" class="form-control" id="">
                                <option value="">----- select size-----</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->product_id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="available_stock[]" class="form-control">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger removeRowBtn" id="removeRow"><i class="fas fa-trash mr-2"></i>Remove Row</button>
                        </td>
                    </tr>
            `;
            $('.rowList').append(rowHtml);

        }
        $('.addRowBtn').click(function(){
            count++;
            addRow(count);
        })
        $('.removeRowBtn').click(function(){
            count--;
            console.log(count);
            $(this).parentsUntil('.variantRow').remove();
        })
    })
   </script>
@endsection --}}
