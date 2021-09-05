@extends('layouts.app')

@section('content')
<div class="page-header" style="background: url(assets/img/banner1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Forgot Password</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{session('status')}}
                    </div>
                    @endif
                    <h3>Forgot Password</h3>
                    <form class="login-form" method="POST" action="{{ route('password.request') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="icon fas fa-user"></i>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Email" value="{{ old('email') }}" required
                                    autocomplete="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-common log-btn" type="submit">
                            Send me my Password
                        </button>
                    </form>
                    <ul class="form-links">
                        <li class="float-left">
                            <a href="{{route('register')}}">Don't have an account?</a>
                        </li>
                        <li class="float-right">
                            <a href="{{route('login')}}">Back to Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection