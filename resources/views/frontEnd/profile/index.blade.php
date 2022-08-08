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
                    @include('frontEnd.profile/profileSidebar')
                </div>
                <div class="col-9">
                    <div class="card border-0 rounded mb-4">
                        <div class="card-header bg-white">
                            <h5 class="my-2">Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            @if (!empty($user->profile_photo_path))
                                <img src="{{ asset('uploads/user/'.$user->profile_photo_path) }}" class="rounded-circle mb-3" alt="" srcset="" style="width: 100px !important; height: 100px !important">
                            @else
                                <img src="{{ asset('frontEnd/resources/image/user-default.png') }}" class="rounded-circle mb-3" alt="" srcset="" style="width: 100px !important; height: 100px !important">
                            @endif
                            <form action="{{ route('user#updateProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Change Profile Photo</label>
                                    <input name="photo" type="file" class="form-control">
                                    @error('photo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email Address</label>
                                    <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button class="mt-3 shadow btn btn-primary text-white float-end">Update Profile</button>
                            </form>
                        </div>
                    </div>
                    <div class="card border-0 rounded">
                        <div class="card-header bg-white">
                            <h5 class="my-2">Change Password</h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin#updatePassword') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Old Password</label>
                                    <input name="oldPassword" type="password" class="form-control" value="">
                                    @error('oldPassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">New Password</label>
                                    <input name="newPassword" type="password" class="form-control" value="">
                                    @error('newPassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input name="confirmPassword" type="password" class="form-control" value="">
                                    @error('confirmPassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <button class="mt-3 shadow btn btn-primary text-white float-end">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
