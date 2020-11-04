@extends('layouts.app')

@section('content')
<div class="container">

<form action='/post' method="post" enctype="multipart/form-data">
{{--protect your application from cross-site request forgery (CSRF) attacks--}}
@csrf 
    <div class="col-8 offset-2">
        <div class="row"><h2>ADD NEW POST</h2></div>
        <div class="form-group row">
            <label for="caption" class="col-md-4 col-form-label">{{ __('Post Caption') }}</label>
            <input id="caption" 
                    type="text"
                    class="form-control @error('caption') is-invalid @enderror"
                    name="caption"
                    value="{{ old('caption') }}"
                    required autocomplete="caption" autofocus>   
                    @error('caption')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="category" class="col-md-4 col-form-label">{{ __('Post category') }}</label>
            <input id="category" 
                    type="text"
                    class="form-control @error('category') is-invalid @enderror"
                    name="category"
                    value="{{ old('category') }}"
                    required autocomplete="category" autofocus>   
                    @error('category')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label">{{ __('Post description') }}</label>
            <input id="description" 
                    type="text"
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') }}"
                    required autocomplete="description" autofocus>   
                    @error('description')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label">{{ __('Post price') }}</label>
            <input id="price" 
                    type="text"
                    class="form-control @error('price') is-invalid @enderror"
                    name="price"
                    value="{{ old('price') }}"
                    required autocomplete="price" autofocus>   
                    @error('price')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label">{{ __('Post location') }}</label>
            <input id="location" 
                    type="text"
                    class="form-control @error('location') is-invalid @enderror"
                    name="location"
                    value="{{ old('location') }}"
                    required autocomplete="location" autofocus>   
                    @error('location')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="row">
            <label for="image" class="col-md-4 col-form-label">{{ __('Post Image') }}</label>
            <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="row pt-4">
            <button class="btn btn-primary"> Add New Post</button>

        </div>
    </div>
</form>
    
</div>
@endsection



