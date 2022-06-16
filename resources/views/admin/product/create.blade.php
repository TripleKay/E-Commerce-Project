@extends('admin.layouts.app')
@section('content')
<div class="row pt-4">
    <div class="col-8">
        <div class="card shadow-none rounded">
            <div class="card-header">
                <h4>Create Product</h4>
            </div>
            <div class="card-body">
                <form action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Brand</label>
                            <select name="" id="" class="form-control">
                                <option value="">-----select brand-----</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Category</label>
                            <select name="" id="" class="form-control">
                                <option value="">-----select category-----</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="">SubCategory</label>
                            <select name="" id="" class="form-control">
                                <option value="">-----select subcategory-----</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Sub-SubCategory</label>
                            <select name="" id="" class="form-control">
                                <option value="">-----select sub-subcategory-----</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Product Name</label>
                            <input type="text" class="form-control" placeholder="enter product name...">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Small Description</label>
                            <input type="text" class="form-control" placeholder="enter small description...">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Long Description</label>
                            <input type="text" class="form-control" placeholder="enter long description ...">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Product Preview Image</label>
                            <input type="file" class="form-control" placeholder="enter long description ...">
                        </div>
                        {{-- <div class="form-group col-4">
                            <label for="">Product Multi Image</label>
                            <input type="file" class="form-control" placeholder="enter long description ...">
                        </div> --}}


                        <div class="form-group col-3">
                            <label for="">Original Price</label>
                            <input type="text" class="form-control" placeholder="enter orginal price ...">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Selling Price</label>
                            <input type="text" class="form-control" placeholder="enter selling price ...">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Discount Price</label>
                            <input type="text" class="form-control" placeholder="enter discount price ...">
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="mb-0" type="checkbox" value="">
                                <label class="ml-2 mb-0">
                                    Special Offer
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="mb-0" type="checkbox" value="">
                                <label class="ml-2 mb-0">
                                    Publish Status
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-lg">Add Product</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-none rouned">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-0">Product Variant Details</h4>
                    <button class="btn btn-dark">New</button>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

