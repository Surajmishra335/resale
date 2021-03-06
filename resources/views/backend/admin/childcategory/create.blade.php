@extends('backend.layouts.master')
@section('content')
<div class="col-md-10">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <h4>Add ChildCategory</h4>
    <div class="card">

        <div class="card-body">

            <form class="forms-sample" action="{{ route('childcategory.store') }}" method="post">@csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="name of childcategory">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">
                                {{ $message }}
                            </strong>

                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Choose subcategory</label>
                    <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                        <option value="">Select category</option>
                        @foreach (App\Models\Subcategory::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>Í
                        @endforeach
                    </select>
                    @error('subcategory_id')
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
</div>
@endsection