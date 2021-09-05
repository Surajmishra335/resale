@extends('layouts.app')
@section('content')
<div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Account Home</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            @if (Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="col-xs-12 col-md-12 col-lg-4 page-sidebar">
                {{-- sidebar --}}
                @include('profile.sidebar')
            </div>
            <div class="col-lg-8 col-md-12 col-xs-12 page-content">
                <div class="row">
                    <div class="col-md-6">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card">
                                <div class="card-header text-white" style="background-color: #03a9f4">Update profile</div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Fullname</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ auth()->user()->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Profile picture</label>
                                        <input type="file" name="image" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Update profile</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @if (session('status') === 'password-updated')
                        <div class="alert alert-success">Your password has been updated</div>
                        @endif
                        <form action="{{ route('user-password.update') }}" method="post">@csrf
                            @method('PUT')

                            <div class="card">
                                <div class="card-header text-white" style="background-color: #03a9f4">Change password</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Current pasword</label>
                                        <input type="text" name="current_password" class="form-control">
                                        @error('current_password')
                                        <div><span class="text-danger">{{ $message }}</span></div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>New pasword</label>
                                        <input type="text" name="password" class="form-control">

                                        @error('password')
                                        <div><span class="text-danger">{{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm pasword</label>
                                        <input type="text" name="password_confirmation" class="form-control">
                                        @error('password_confirmation')
                                        <div><span class="text-danger">{{ $message }}</span></div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">Update password</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection