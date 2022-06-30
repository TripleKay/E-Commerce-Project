@extends('admin.layouts.app')
@section('content')
    <div class="row pt-4">
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class="p-3 rounded">
                        <i class="fas fa-shopping-bag text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Total Orders</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-th text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Total Products</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-users text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Total Customers</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-map-marker-alt text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Support Location</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
