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

                <div class="inner-box">
                    <h2 class="title-2"><i class="fas fa-credit-card"></i> My ADS</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered add-manage-table">
                            <thead>
                                <tr>

                                    <th>Photo</th>
                                    <th>Adds Details</th>
                                    <th>Price</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ads as $key => $ad)

                                <tr>
                                    <td class="add-img-td">
                                        <a href="{{route('product.view', [$ad->id, $ad->slug])}}">
                                            <img class="img-fluid" src="{{Storage::url($ad->feature_image)}}"
                                                alt="img" />
                                        </a>
                                    </td>
                                    <td class="ads-details-td">
                                        <h4>
                                            <a href="{{route('product.view', [$ad->id, $ad->slug])}}">{{$ad->name}}</a>
                                        </h4>

                                    </td>
                                    <td class="price-td">
                                        <strong>$ {{$ad->price}}</strong>
                                    </td>
                                    <td class="action-td">
                                        <form action="{{route('ad.remove')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="adId" value="{{$ad->id}}">
                                            <button class="btn btn-danger btn-xs" type="submit">
                                                <i class="fas fa-trash"></i>
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <p>You dont have any ads !</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection