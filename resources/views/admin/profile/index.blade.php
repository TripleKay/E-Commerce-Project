@extends('admin.layouts.app')
@section('content')
<div class="row pt-4">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="card shadow-none rounded position-relative">
            {{-- <div class="card-header bg-primary">

            </div> --}}
            <div class="rounded-circle overflow-hidden" style="max-width: 10px !important: max-height: 10px !important">
                <img src="{{ asset('frontEnd/resources/image/user-default.png') }}" class="img-fluid" alt="" srcset="" >
            </div>
            <div class="card-body">
                <h1>HELLO PROFILE</h1>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-none rounded">
            <div class="card-header bg-primary"><h4 class="mb-0">Edit Profile</h4></div>
            {{-- <img src="{{ asset('frontEnd/resources/image/user-default.png') }}" class="rounded-circle" alt="" srcset="" style="width: 80px !important: height: 100px !important"> --}}
            <div class="card-body">
                <form action="">
                    <div class="form-grop">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" placeholder="enter phone number ....." value="">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" placeholder="enter address .....">
                    </div>
                    <hr>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
