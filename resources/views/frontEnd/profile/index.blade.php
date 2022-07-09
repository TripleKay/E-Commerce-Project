@extends('frontEnd.layouts.app')
@section('content')
    <section class="py-4 min-vh-100">
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

                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                          My Profile
                        </a>
                        <a href="{{ route('user#myOrder') }}" class="list-group-item list-group-item-action">My Orders</a>
                        <a href="#" class="list-group-item list-group-item-action">My Wishlists</a>
                        <a href="#" class="list-group-item list-group-item-action">My Carts</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card bg-white">
                        <div class="card-header bg-transparent">
                            <h4>Hello profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->phone }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
