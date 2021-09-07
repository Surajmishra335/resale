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
                                        <a href="#">
                                            <img class="img-fluid" src="{{Storage::url($ad->feature_image)}}"
                                                alt="img" />
                                        </a>
                                    </td>
                                    <td class="ads-details-td">
                                        <h4>
                                            <a href="#">{{$ad->name}}</a>
                                        </h4>
                                        <p>
                                            <strong> Status </strong>:
                                            @if ($ad->published)
                                            <span class="badge badge-success">published</span>
                                            @else
                                            <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="price-td">
                                        <strong>$ {{$ad->price}}</strong>
                                    </td>
                                    <td class="action-td">
                                        <p>
                                            <a class="btn btn-primary btn-xs"
                                                href="{{route('product.view', [$ad->id, $ad->slug])}}">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-xs" href="{{route('ad.edit', $ad->id)}}"
                                                target="_blank">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                        </p>
                                        <p>
                                            <a class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#exampleModal{{$ad->id}}">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                            <div class="modal fade " id="exampleModal{{$ad->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{route('ad.delete', $ad->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are your sure you want to delete this add?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                    </td>
                                </tr>
                                @empty
                                <p>You dont have any ads !</p>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination-bar">
                            {{$ads->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection