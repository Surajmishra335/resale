<div class="header">
  <nav class="navbar navbar-expand-lg bg-inverse fixed-top scrolling-navbar">
    <div class="container">
      <div class="theme-header clearfix">
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-toggle="collapse"
            aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="lni-menu"></span>
            <span class="lni-menu"></span>
            <span class="lni-menu"></span>
          </button>
          <a href="{{route('home')}}" class="navbar-brand"><img src="{{asset('assets/img/logo.png')}}" alt="" /></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('home')}}">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#categorylist"> Category </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">
                About Us
              </a> 
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Blog
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a>
                </li>
                <li>
                  <a class="dropdown-item" href="blog-left-sideba.html">Blog - Left Sidebar</a>
                </li>
                <li>
                  <a class="dropdown-item" href="blog-full-width.html">
                    Blog full width
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('contact')}}"> Contact </a>
            </li>
            {{-- dropdown --}}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="lnr lnr-user"></i>
                @if (Auth::check())
                {{Auth::user()->name}}
                @else
                My Account
                @endif
              </a>
              <ul class="dropdown-menu">
                @if (Auth::check())
                    @if (Auth::user()->isadmin == 1)
                    <li>
                      <a class="dropdown-item" href="{{route('admin')}}"><i class="lnr lnr-home"></i> Admin Dashboard</a>
                    </li>
                    @endif
                @endif
                <li>
                  <a class="dropdown-item" href="{{route('profile')}}"><i class="lnr lnr-home"></i> Account Home</a>
                </li>
                <li>
                  @if (Auth::check())
                  <a class="dropdown-item" href="{{route('messages')}}"><i class="lnr lnr-envelope"></i>
                    Message</a>
                  @endif

                </li>
                <li>
                  <a class="dropdown-item" href="{{route('ads.index')}}"><i class="lnr lnr-cart"></i> My Ads</a>
                </li>
                <li>
                  <a class="dropdown-item" href="account-favourite-ads.html"><i class="lnr lnr-heart"></i> Favourite
                    ads</a>
                </li>
                <li>
                  <a class="dropdown-item" href="account-archived-ads.html"><i class="lnr lnr-file-add"></i>
                    Archived</a>
                </li>
                <li>
                  @if (Auth::check())
                  <a class="dropdown-item" href="{{route('profile')}}"><i class="lnr lnr-file-add"></i>
                    Profile</a>
                  @else
                  <a class="dropdown-item" href="{{ route('login') }}"><i class="lnr lnr-lock"></i> Log In</a>
                  @endif

                </li>

                @if (!Auth::check())
                <li>
                  <a class="dropdown-item" href="{{ route('register') }}"><i class="lnr lnr-user"></i> Signup</a>
                </li>

                <li>
                  <a class="dropdown-item" href="forgot-password.html"><i class="lnr lnr-sync"></i> Forgot Password</a>
                </li>
                @endif

                <li>
                  <a class="dropdown-item" href="account-close.html"><i class="lnr lnr-cross"></i>Account close</a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="lnr lnr-cross"></i>Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </ul>
            </li>
            <li class="postadd">
              <a class="btn btn-danger btn-post" href="{{route('ads.create')}}"><span class="fas fa-plus-circle"></span>
                Post an
                Ad</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="mobile-menu" data-logo="assets/img/logo-mobile.png"></div>
  </nav>
  {{-- second menu --}}
  <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm navbar-hover " style="padding-top: 77px; ">

    <a class="navbar-brand text-white" href="#">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
      aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarHover">
      <ul class="container-fluid navbar-nav justify-content-center">

        @foreach ($menus as $menuItem)
        <li class="nav-item dropdown">
          <a href="{{route('category.show', $menuItem->slug)}}" class="nav-link dropdown-toggle"
            data-toggle="dropdown_remove_dropdown_class_for_clickable_link" arial-haspopup="true" arial-expanded="false"
            style="color: #fff">
            {{$menuItem->name}}
          </a>

          <ul class="dropdown-menu">
            @foreach ($menuItem->subcategories as $subMenuItem)
            <li>
              <a href="{{route('subcategory.show', [$menuItem->slug, $subMenuItem->slug])}}"
                class="dropdown-item dropdown-toggle">{{$subMenuItem->name}}</a>
              <ul class="dropdown-menu">
                @foreach ($subMenuItem->childcategories as $childMenuItem)
                <li>
                  <a href="{{route('childcategory.show', [$menuItem->slug, $subMenuItem->slug, $childMenuItem->slug])}}"
                    class="dropdown-item">{{$childMenuItem->name}}</a>
                </li>
                @endforeach
              </ul>
            </li>
            @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
    </div>

  </nav>

  {{-- third menu --}}

</div>