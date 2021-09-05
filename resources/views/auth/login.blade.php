@extends('layouts.app')

@section('content')
<div class="page-header" style="background: url(assets/img/banner1.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-wrapper">
          <h2 class="page-title">Login to account</h2>
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
          <h3>Login</h3>
          <form  class="login-form" method="post" action="{{route('login')}}">
            @csrf
            <div class="form-group">
              <div class="input-icon">
                <i class="icon fas fa-user"></i>
                <input type="text" id="email" placeholder="Email"
                  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                  required autocomplete="email" />
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
            <div class="checkbox">
              <input type="checkbox" id="remember" name="remember"  style="float: left" {{ old('remember') ? 'checked' : '' }}/>
              <label for="remember">Remember me</label>
            </div>
            <button class="btn btn-common log-btn" type="submit">Login</button>
          </form>
          <ul class="form-links">
            <li class="float-left">
              <a href="{{route('register')}}">Don't have an account?</a>
            </li>
            <li class="float-right">
              <a href="{{route('password.request')}}">Lost your password?</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection