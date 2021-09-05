@extends('layouts.app')

@section('content')
<div class="page-header" style="background: url(assets/img/banner1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Sign Up</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="page-login-form box">
                    <h3>Register</h3>
                    <form role="form" class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="icon fas fa-user"></i>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Name" value="{{ old('name') }}" required autocomplete="name" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="icon fas fa-envelope"></i>
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Email Address" value="{{ old('email') }}" required
                                    autocomplete="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="icon fas fa-unlock-alt"></i>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password"/>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="icon fas fa-unlock-alt"></i>
                                <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="remember" name="rememberme" value="forever"
                                style="float: left" />
                            <label for="remember">By creating account you agree to our Terms &
                                Conditions</label>
                        </div>
                        <button class="btn btn-common log-btn" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection