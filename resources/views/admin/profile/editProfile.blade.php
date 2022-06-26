@extends('admin.layouts.app')
@section('content')
<div class="row pt-4">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="card shadow-none rounded">
            <div class="card-header bg-primary">
                <h4 class="mb-0">Edit Profile</h4>
            </div>
            {{-- <img src="{{ asset('frontEnd/resources/image/user-default.png') }}" class="rounded-circle" alt="" srcset="" style="width: 80px !important: height: 100px !important"> --}}
            <div class="card-body">

                <form action="{{ route('admin#editProfile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $data->name }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input name="email" type="email" class="form-control" value="{{ $data->email }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <hr>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
