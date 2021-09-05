@extends('backend.layouts.master')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <span>
            <h2>Add Your Basic Elements of website</h2>
            
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
        <form id="demo-form" action="{{route('admin.setting.save')}}" method="post"> @csrf

            <div class="form-group">
                <label for="address">Office Address</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                    value="{{$setting->address}}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Office Phone Number</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{$setting->phone}}">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="mail">Company Mail Id</label>
                <input type="text" name="mail" class="form-control @error('mail') is-invalid @enderror"
                value="{{$setting->mail}}">
                @error('mail')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fb">Facebook Link</label>
                <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror"
                value="{{$setting->fb}}">
                @error('fb')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror"
                value="{{$setting->twitter}}">
                @error('twitter')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror"
                value="{{$setting->instagram}}">
                @error('instagram')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="youtube">Youtube</label>
                <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror"
                value="{{$setting->youtube}}">
                @error('youtube')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="linkedin">linkedin</label>
                <input type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror"
                value="{{$setting->linkedin}}">
                @error('linkedin')
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
        <!-- end form for validations -->

    </div>
</div>
@endsection