@extends('backend.layouts.master')

@section('content')
<div class="card">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="card-header">
        <h3>Update Subcategory</h3>
    </div>
    <div class="card-body">

        <form class="forms-sample" action="{{ route('subcategory.update',[$subcategory->id]) }}" method="post">@csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{$subcategory->name}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>

                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Choose category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">Select category</option>
                    @foreach (App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{$subcategory->category_id == $category->id ? 'selected':''}}>
                        {{ $category->name }}</option>Í
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>
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