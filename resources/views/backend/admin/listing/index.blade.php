@extends('backend.layouts.master')
@section('content')
<div class="row justify-content-center">


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            @if (Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card-header">
                <h4>Manage ad</h4>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Seller</th>
                                <th>Image</th>
                                <th>Ad Name</th>
                                <th>Post Date</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $ad)
                            @if ($ad)
                            <tr>
                                {{-- seller Details --}}
                                <td>
                                    <a href="{{route('show.user.ads', [$ad->user_id])}}" target="_blank">
                                        @if ($ad->user->avatar)
                                        <img src="{{Storage::url($ad->user->avatar)}}" alt=""
                                            style="height: 75px; width:auto; border-radius: 50%;">
                                        @else
                                        <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                            style="height: 75px; width:auto; border-radius: 50%;">
                                        @endif
                                        {{$ad->user->name}}
                                    </a>
                                </td>

                                {{-- ads Image --}}
                                <td><img src="{{Storage::url($ad->feature_image)}}" alt="" height="100"></td>

                                {{-- Ads Name --}}
                                <td>{{$ad->name}}</td>

                                {{-- posting date --}}
                                <td>{{$ad->created_at->format('Y-m-d')}}</td>

                                {{-- link to view --}}
                                <td> <a href="{{route('product.view', [$ad->id, $ad->slug])}}"><button
                                            class="btn btn-info">View</button></a>
                                </td>

                                {{-- button to delete --}}
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal{{$ad->id}}">
                                        Delete <i class="mdi mdi-delete"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$ad->id}}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{route('ad.delete',[$ad->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete
                                                            Confirmations
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you really want to delete ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @else
                            <p>NO ad found in record</p>
                            @endif

                            @endforeach
                        </tbody>
                    </table>
                    {{$ads->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection