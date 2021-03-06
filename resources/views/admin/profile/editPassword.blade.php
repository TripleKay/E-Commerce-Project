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
        <div class="card shadow-none rounded">
            <div class="card-header bg-primary">
                <h4 class="mb-0">Change Password</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('admin#editPassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input name="oldPassword" type="password" class="form-control" value="">
                        @error('oldPassword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input name="newPassword" type="password" class="form-control" value="">
                        @error('newPassword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input name="confirmPassword" type="password" class="form-control" value="">
                        @error('confirmPassword')
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
