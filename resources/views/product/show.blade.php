@extends('layouts.app')
@section('content')
<div id="content">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="inner-box ads-details-wrapper">
                    <h2>{{$advertisement->name}}</h2><br>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{Storage::url($advertisement->feature_image)}}" class="d-block w-100"
                                    alt="...">
                            </div>
                            @if ($advertisement->first_image)


                            <div class="carousel-item">
                                <img src="{{Storage::url($advertisement->first_image)}}" class="d-block w-100"
                                    alt="...">
                            </div>
                            @endif

                            @if ($advertisement->second_image)
                            <div class="carousel-item">
                                <img src="{{Storage::url($advertisement->second_image)}}" class="d-block w-100"
                                    alt="...">
                            </div>
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="box">
                    <h2 class="title-2"><strong>Ad Description</strong></h2>
                    <div class="row">
                        <div class="ads-details-info col-md-12">
                            <p class="mb15">
                                {!! $advertisement->description !!}
                            </p>

                        </div>

                    </div>
                </div><br>
                <div class="box">
                    <h2 class="title-2"><strong>Ad Location</strong></h2>
                    <div class="row">
                        <div class="ads-details-info col-md-12">
                            <p class="mb15">
                                <strong>Country :</strong> {{$advertisement->country->name}}
                            </p>
                            <p class="mb15">
                                <strong>Sate :</strong> {{$advertisement->state->name}}
                            </p>
                            <p class="mb15">
                                <strong>City :</strong> {{$advertisement->city->name}}
                            </p>

                        </div>

                    </div>
                </div><br>
                @if ($advertisement->link)
                <div class="box">
                    <h2 class="title-2"><strong>Ad Video</strong></h2>
                    <div class="row">
                        <div class="ads-details-info col-md-12">
                            {!! $advertisement->displayVideoFromLink() !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- TODO add similar product --}}
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="inner-box">
                    <div class="widget-title">
                        <span>
                            <h4>Ad Deatils</h4>
                        </span>

                    </div>
                    <div>
                        <h3> $ {{$advertisement->price}}</h3>
                        <hr>
                        <p><strong>Condition: </strong> {{$advertisement->product_condition}}</p><br>
                        <p> <strong>Address: </strong> {{$advertisement->listing_location}}</p><br>
                        <p><strong>Date: </strong>{{$advertisement->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="inner-box">
                    <div class="widget-title">
                        <h4>Seller Deatils</h4>
                    </div>
                    <div>

                        <div class="seller-intro">

                            @if ($advertisement->user->avatar)
                            <img src="{{Storage::url($advertisement->user->avatar)}}" alt="">
                            @else
                            <img src="{{asset('assets/img/avatar.png')}}" alt="">
                            @endif

                            <div>
                                <a href="{{route('show.user.ads', [$advertisement->user_id])}}"
                                    class="publisher-name h6">{{$advertisement->user->name}}</a>
                            </div>

                        </div>
                        <hr>
                        <div class="message">
                            @if (Auth()->check())
                            @if (auth()->user()->id != $advertisement->user_id)
                            <message seller-name="{{$advertisement->user->name}}" :user-id="{{auth()->user()->id}}"
                                :receiver-id="{{$advertisement->user->id}}" :ad-id="{{$advertisement->id}}">
                            </message>
                            @endif
                            @endif
                        </div><br>
                        <div>
                            @if (Auth()->check())
                            @if ($advertisement->phone_number)
                            <phone :phone-number="{{$advertisement->phone_number}}"></phone>
                            @endif
                            @else
                            Please Login to Chat or view Phone number <a href="{{route('login')}}"
                                class="btn btn-primary">Login</a>
                            @endif
                        </div><br>
                        <div>
                            @if (Auth::check())
                            @if (!$advertisement->didUserSavedAd() && auth()->user()->id != $advertisement->user_id)
                            <save-ad :ad-id="{{ $advertisement->id }}" :user-id="{{ auth()->user()->id }}">
                            </save-ad>
                            @endif
                            @endif

                        </div><br>
                        <div>
                            <span>
                                @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                <a href="" data-toggle="modal" data-target="#exampleModal{{$advertisement->id}}">
                                    Report This Ad
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$advertisement->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form action="{{ route('report.ad') }}" method="post">@csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Something wrong with
                                                        this ads ?
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Select reason</label>
                                                        <select class="form-control" name="reason" required>
                                                            <option value="">select</option>
                                                            <option value="Fraud">Fraud</option>
                                                            <option value="Duplicate">Duplicate</option>
                                                            <option value="Spam">Spam</option>
                                                            <option value="Wrong-category">Wrong Category</option>
                                                            <option value="Offesnsive">Offensive</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Your Email</label>
                                                        @if (Auth::check())
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ Auth::user()->email }}" readonly>
                                                        @else
                                                        <input type="email" name="email" class="form-control" required>
                                                        @endif

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Your Message</label>
                                                        <textarea name="message" class="form-control"
                                                            required></textarea>
                                                    </div>
                                                    <input type="hidden" name="ad_id" value="{{ $advertisement->id }}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Report this ad</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <section class="featured-lis mb30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                    <h3 class="section-title">Related Products</h3>
                    <div id="new-products" class="owl-carousel">
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img src="assets/img/product/img1.jpg" alt="">
                                    <div class="overlay">
                                        <a href="ads-details.html"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>
                                <a href="ads-details.html" class="item-name">Lorem ipsum dolor sit</a>
                                <span class="price">$150</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img src="assets/img/product/img2.jpg" alt="">
                                    <div class="overlay">
                                        <a href="ads-details.html"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>
                                <a href="ads-details.html" class="item-name">Sed diam nonummy</a>
                                <span class="price">$67</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img src="assets/img/product/img3.jpg" alt="">
                                    <div class="overlay">
                                        <a href="ads-details.html"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>
                                <a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
                                <span class="price">$300</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img src="assets/img/product/img4.jpg" alt="">
                                    <div class="overlay">
                                        <a href="ads-details.html"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>
                                <a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
                                <span class="price">$45</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item">
                                <div class="carousel-thumb">
                                    <img src="assets/img/product/img5.jpg" alt="">
                                    <div class="overlay">
                                        <a href="ads-details.html"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>
                                <a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
                                <span class="price">$1120</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>

@endsection