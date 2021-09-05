@extends('layouts.app')
@section('content')
<section id="intro" class="section-intro">
  <div class="overlay">
    <div class="container">
      <div class="main-text">
        <h1 class="intro-title">Welcome To <span>Classix</span></h1>
        <p class="sub-title">
          Buy and sell everything from used cars to mobile phones and
          computers, or search for property, jobs and more
        </p>

        @include('layouts.inc.search')
      </div>
    </div>
  </div>
</section>

<div class="wrapper" id="categorylist">
  <section id="categories-homepage">
    <div class="container">
      <div class="row">
        @if ($categories->count() > 0)

        <div class="col-md-12 text-center">
          <h3 class="section-title">Browse Ads from All Categories</h3>
        </div>
        @foreach ($categories as $category)
        <div class="col-lg-3 col-md-6 col-xs-12">
          <div class="category-box border-1 wow fadeInUpQuick" data-wow-delay="0.3s">
            <div class="icon">
              <a href="{{route('category.show', [$category->slug])}}">
                {{-- <i class="fas fa-car color-1"></i> --}}
                <img src="{{Storage::url($category->image)}}" alt=""
                  style="height: 50px; width: 50px; border-radius: 50%">
              </a>
            </div>
            <div class="category-header">
              <a href="{{route('category.show', [$category->slug])}}">
                <h4>{{$category->name}}</h4>
              </a>
            </div>
            <div class="category-content">
              <ul>
                @forelse ($category->subcategories as $subcategory)
                @if ($loop->index < 5) <li>
                  <a
                    href="{{route('subcategory.show',[$category->slug, $subcategory->slug])}}">{{$subcategory->name}}</a>
                  <span class="category-counter">3</span>
                  </li>
                  @endif

                  @empty
                  No sub category for this
                  @endforelse
                  <li>
                    <a href="{{route('category.show',[$category->slug])}}">View All</a>
                    <span class="category-counter">3</span>
                  </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>


  {{-- car section --}}
  <section class="featured-lis">
    <div class="container">
      <div class="row">
        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
          <span class="vertical-center">
            <h3 class="section-title">Cars</h3>
            <a href="{{route('category.show', $category->slug)}}" class="float-right">View All</a>
          </span>
          <div id="carouselExampleFade{{$category->id}}" class="carousel slide" data-ride="carousel" ata-interval="200">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  @forelse ($firstAds as $firstad)
                  <div class="col-3">
                    <a href="{{route('product.view', [$firstad->id, $firstad->slug])}}">
                      <img src="{{Storage::url($firstad->feature_image)}}" class="img-thumbnail" alt="...">

                      <p class="text-center card-footer" style="color: #222;">{{$firstad->name}}/
                        ${{$firstad->price}}</p>
                    </a>

                  </div>
                  @empty

                  @endforelse

                </div>
              </div>
              @if ($secondAds->count() > 0)
              <div class="carousel-item">
                <div class="row">
                  @forelse ($secondAds as $secondad)
                  <div class="col-3">
                    <a href="{{route('product.view', [$secondad->id, $secondad->slug])}}">
                      <img src="{{Storage::url($secondad->feature_image)}}" class="img-thumbnail" alt="...">
                      <p class="text-center card-footer" style="color: #222;">{{$secondad->name}}/
                        ${{$secondad->price}}</p>
                    </a>
                  </div>
                  @empty

                  @endforelse

                </div>
              </div>
              @endif

            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade{{$category->id}}" role="button"
              data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade{{$category->id}}" role="button"
              data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Electronics Section --}}

  @if ($firstAdsForElectronics->count() > 0)
  <section class="featured-lis">
    <div class="container">
      <div class="row">
        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
          <span class="vertical-center">
            <h3 class="section-title">Cars</h3>
            <a href="{{route('category.show', $categoryElectronics->slug)}}" class="float-right">View All</a>
          </span>
          <div id="carouselExampleFade{{$categoryElectronics->id}}" class="carousel slide" data-ride="carousel"
            ata-interval="200">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  @forelse ($firstAdsForElectronics as $firstAdForElectronic)
                  <div class="col-3">
                    <a href="{{route('product.view', [$firstAdForElectronic->id, $firstAdForElectronic->slug])}}">
                      <img src="{{Storage::url($firstAdForElectronic->feature_image)}}" class="img-thumbnail" alt="..."
                        style="min-height: 170px">

                      <p class="text-center card-footer" style="color: #222;">{{$firstAdForElectronic->name}}/
                        ${{$firstAdForElectronic->price}}</p>
                    </a>

                  </div>
                  @empty

                  @endforelse

                </div>
              </div>
              @if ($secondAdsForElectronics->count() > 0)
              <div class="carousel-item">
                <div class="row">
                  @forelse ($secondAdsForElectronics as $secondAdForElectronic)
                  <div class="col-3">
                    <a href="{{route('product.view', [$secondAdForElectronic->id, $secondAdForElectronic->slug])}}">
                      <img src="{{Storage::url($secondAdForElectronic->feature_image)}}" class="img-thumbnail"
                        alt="...">
                      <p class="text-center card-footer" style="color: #222;">{{$secondAdForElectronic->name}}/
                        ${{$secondAdForElectronic->price}}</p>
                    </a>
                  </div>
                  @empty

                  @endforelse

                </div>
              </div>
              @endif

            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade{{$categoryElectronics->id}}" role="button"
              data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade{{$categoryElectronics->id}}" role="button"
              data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="0.3s">
            <div class="features-icon">
              <i class="fas fa-book"> </i>
            </div>
            <div class="features-content">
              <h4>Full Documented</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="0.6s">
            <div class="features-icon">
              <i class="fas fa-paper-plane"></i>
            </div>
            <div class="features-content">
              <h4>Clean & Modern Design</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="0.9s">
            <div class="features-icon">
              <i class="fas fa-map"></i>
            </div>
            <div class="features-content">
              <h4>Great Features</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="1.2s">
            <div class="features-icon">
              <i class="fas fa-cogs"></i>
            </div>
            <div class="features-content">
              <h4>Completely Customizable</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="1.5s">
            <div class="features-icon">
              <i class="fas fa-hourglass"></i>
            </div>
            <div class="features-content">
              <h4>100% Responsive Layout</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="1.8s">
            <div class="features-icon">
              <i class="fas fa-hashtag"></i>
            </div>
            <div class="features-content">
              <h4>User Friendly</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="2.1s">
            <div class="features-icon">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="features-content">
              <h4>Awesome Layout</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="2.4s">
            <div class="features-icon">
              <i class="fas fa-leaf"></i>
            </div>
            <div class="features-content">
              <h4>High Quality</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="features-box wow fadeInDownQuick" data-wow-delay="2.7s">
            <div class="features-icon">
              <i class="fab fa-google-plus"></i>
            </div>
            <div class="features-content">
              <h4>Free Google Fonts Use</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Quo aut magni perferendis repellat rerum assumenda facere.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="location">
    <div class="container">
      <div class="row localtion-list">
        <div class="col-lg-6 col-12-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.5s">
          <h3 class="title-2">
            <i class="fas fa-envelope"></i> Subscribe for updates
          </h3>
          <form id="subscribe" action="">
            <p>
              Join our 10,000+ subscribers and get access to the latest
              templates, freebies, announcements and resources!
            </p>
            <div class="subscribe">
              <input class="form-control" name="EMAIL" placeholder="Your email here" required="" type="email" />
              <button class="btn btn-common" type="submit">
                Subscribe
              </button>
            </div>
          </form>
        </div>
        <div class="col-lg-6 col-12-6 col-xs-12 wow fadeInRight" data-wow-delay="1s">
          <div class="row">
            <div class="col-12">
              <h3 class="title-2">
                <i class="fas fa-search"></i> Popular Searches
              </h3>
            </div>
            <ul class="col-lg-4 col-md-4 col-xs-12">
              <li><a href="account-saved-search.html">puppies</a></li>
              <li>
                <a href="account-saved-search.html">puppies for sale</a>
              </li>
              <li><a href="account-saved-search.html">bed</a></li>
              <li><a href="account-saved-search.html">household</a></li>
              <li><a href="account-saved-search.html">chair</a></li>
              <li><a href="account-saved-search.html">materials</a></li>
            </ul>
            <ul class="col-lg-4 col-md-4 col-xs-12">
              <li><a href="account-saved-search.html">sofa</a></li>
              <li><a href="account-saved-search.html">wanted</a></li>
              <li><a href="account-saved-search.html">furniture</a></li>
              <li><a href="account-saved-search.html">van</a></li>
              <li><a href="account-saved-search.html">wardrobe</a></li>
              <li><a href="account-saved-search.html">caravan</a></li>
            </ul>
            <ul class="col-lg-4 col-md-4 col-xs-12">
              <li><a href="account-saved-search.html">for sale</a></li>
              <li><a href="account-saved-search.html">free</a></li>
              <li>
                <a href="account-saved-search.html">1 bedroom flat</a>
              </li>
              <li><a href="account-saved-search.html">photo+video</a></li>
              <li><a href="account-saved-search.html">bmw</a></li>
              <li><a href="account-saved-search.html">Land </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<section id="counter">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="counting wow fadeInDownQuick" data-wow-delay="0.5s">
          <div class="icon">
            <span>
              <i class="lnr lnr-tag"></i>
            </span>
          </div>
          <div class="desc">
            <h3 class="counter">12090</h3>
            <p>Regular Ads</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="counting wow fadeInDownQuick" data-wow-delay="1s">
          <div class="icon">
            <span>
              <i class="lnr lnr-map"></i>
            </span>
          </div>
          <div class="desc">
            <h3 class="counter">350</h3>
            <p>Locations</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="counting wow fadeInDownQuick" data-wow-delay="1.5s">
          <div class="icon">
            <span>
              <i class="lnr lnr-users"></i>
            </span>
          </div>
          <div class="desc">
            <h3 class="counter">23453</h3>
            <p>Reguler Members</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="counting wow fadeInDownQuick" data-wow-delay="2s">
          <div class="icon">
            <span>
              <i class="lnr lnr-license"></i>
            </span>
          </div>
          <div class="desc">
            <h3 class="counter">150</h3>
            <p>Premium Ads</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection