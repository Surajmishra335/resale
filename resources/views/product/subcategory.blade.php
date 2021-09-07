@extends('layouts.app')
@section('content')
<div id="search-row-wrapper">
    <div class="container">
        <div class="search-inner">
            @include('layouts.inc.search')
        </div>
    </div>
</div>

<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="categories">
                            <div class="widget-title">
                                <i class="fas fa-align-justify"></i>
                                <h4>Filters</h4>
                            </div>
                            <div class="categories-list">
                                <ul>
                                    @foreach ($childCategoryByFilterId as $childcategoryName)
                                    @if ($childcategoryName)
                                    <li>
                                        <a
                                            href="{{url()->current()}}/{{($childcategoryName->childcategory->name) ?? ''}}">
                                            <i class="fas fa-desktop"></i>
                                            {{$childcategoryName->childcategory->name}} <span
                                                class="category-counter">(9)</span>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="inner-box">
                        <div class="widget-title">
                            <h4>Price</h4>
                        </div>
                        <div class="advimg">
                            <form action="{{url()->current()}}" method="GET">
                                <div class="form-group">
                                    <label for="">Minimum Price</label>
                                    <input type="number" name="minPrice" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Maximum Price</label>
                                    <input type="number" name="maxPrice" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="inner-box">
                        <div class="widget-title">
                            <h4>Advertisement</h4>
                        </div>
                        <img src="assets/img/img1.jpg" alt="" />
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 col-md-12 col-xs-12 page-content">
                <div class="product-filter">
                    <div class="grid-list-count">
                        <a class="list switchToGrid" href="#"><i class="fas fa-list"></i></a>
                        <a class="grid switchToList" href="#"><i class="fas fa-th-large"></i></a>
                    </div>
                    <div class="short-name">
                        <span>Short By</span>
                        <form class="name-ordering" method="post">
                            <label>
                                <select name="order" class="orderby">
                                    <option selected="selected" value="menu-order">
                                        Short by
                                    </option>
                                    <option value="popularity">Price: Low to High</option>
                                    <option value="popularity">Price: High to Low</option>
                                </select>
                            </label>
                        </form>
                    </div>
                    <div class="Show-item">
                        <span>Show Items</span>
                        <form class="woocommerce-ordering" method="post">
                            <label>
                                <select name="order" class="orderby">
                                    <option selected="selected" value="menu-order">
                                        49 items
                                    </option>
                                    <option value="popularity">popularity</option>
                                    <option value="popularity">Average ration</option>
                                    <option value="popularity">newness</option>
                                    <option value="popularity">price</option>
                                </select>
                            </label>
                        </form>
                    </div>
                </div>

                <div class="adds-wrapper">
                    @forelse ($advertisements as $advertisement)
                    <div class="item-list">
                        <div class="row">
                            <div class="col-sm-2 no-padding photobox">
                                <div class="add-image">
                                    <a href="{{route('product.view', [$advertisement->id, $advertisement->slug])}}"><img src="{{Storage::url($advertisement->feature_image)}}" alt="" /></a>
                                    <span class="photo-count"><i class="fas fa-camera"></i>2</span>
                                    {{-- TODO make it dynamic --}}
                                </div>
                            </div>
                            <div class="col-sm-7 add-desc-box">
                                <div class="add-details">
                                    <h5 class="add-title">
                                        <a href="{{route('product.view', [$advertisement->id, $advertisement->slug])}}">{{$advertisement->name}}</a>
                                    </h5>
                                    <div class="info">

                                        <span class="date">
                                            <i class="fas fa-clock"></i>
                                            {{$advertisement->created_at->diffForHumans()}}
                                        </span>
                                        - <span class="category">{{$advertisement->category->name}}</span> -
                                        <span class="item-location"><i class="fas fa-map-marker"></i>
                                            {{$advertisement->city->name}}
                                        </span>
                                    </div>
                                    <div class="item_desc">
                                        <a href="{{route('product.view', [$advertisement->id, $advertisement->slug])}}">{{Str::limit($advertisement->description, 70)}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 float-right price-box">
                                <h2 class="item-price">$ {{$advertisement->price}}</h2>
                                <a class="btn btn-danger btn-sm"><i class="fas fa-certificate"></i>
                                    <span>Top Ads</span></a> {{-- TODO make it dynamic --}}
                                <a class="btn btn-common btn-sm">
                                    <i class="fas fa-eye"></i> <span>215</span>{{-- TODO make it dynamic --}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    No Ads to display for this category
                    @endforelse
                </div>

                <div class="col-12">
                    <div class="pagination-bar">
                        {{$advertisements->appends(request()->all())->links("pagination::bootstrap-4")}}
                    </div>

                    <div class="post-promo text-center">
                        <h2>Do you get anything for sell ?</h2>
                        <h5>
                            Sell your products online FOR FREE. It's easier than you think
                            !
                        </h5>
                        <a href="{{route('ads.create')}}" class="btn btn-post btn-danger">Post a Free Ad
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection