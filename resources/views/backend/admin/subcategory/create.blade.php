@extends('backend.layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add Subcategory</h3>
    </div>
    <div class="card-body">
        @if (Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <form class="forms-sample" action="{{route('subcategory.store')}}" method="post">@csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="name of subcategory">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>

                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Select Category</label>
                {{-- //TODO find why this is not giving any error --}}
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                    <option>Select Category</option>
                    @foreach (App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>

                </span>
                @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection