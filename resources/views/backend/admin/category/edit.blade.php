@extends('backend.layouts.master')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <span>
            <h2>Update Category </h2>
            <a href="{{route('category.index')}}" class="pull-right btn btn-primary">View All</a>
        </span>
        

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @if (Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <!-- start form for validation -->
        <form class="forms-sample" action="{{route('category.update',[$category->id])}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="name of category" value="{{$category->name}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>

                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror"
                    name="image">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>

                </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <!-- end form for validations -->

    </div>
</div>
@endsection