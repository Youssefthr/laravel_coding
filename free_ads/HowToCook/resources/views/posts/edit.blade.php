@extends('layouts.app')

@section('content')
<div class="container">
<form action='/post/{{ $post->id }}/{{ $post->user_id }}/patch' method="post" enctype="multipart/form-data">
{{--protect your application from cross-site request forgery (CSRF) attacks--}}
@csrf 
@method('PATCH')

    <div class="col-8 offset-2">
        <div class="row"><h2>Edit Post</h2></div>

        <div class="form-group row">
            <label for="caption" class="col-md-4 col-form-label">{{ __('Caption') }}</label>
            <input id="caption" 
                    type="text"
                    class="form-control @error('caption') is-invalid @enderror"
                    name="caption"
                    value="{{ old('caption') ?? $post->caption }}"
                    required autocomplete="caption" autofocus>   
                    @error('caption')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="category" class="col-md-4 col-form-label">{{ __('Category') }}</label>
            <input id="category" 
                    type="text"
                    class="form-control @error('category') is-invalid @enderror"
                    name="category"
                    value="{{ old('category') ?? $post->category }}"
                    >   
                    @error('category')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>
            <input id="description" 
                    type="description"
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') ?? $post->description }}"
                    >   
                    @error('description')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label">{{ __('Price') }}</label>
            <input id="price" 
                    type="price"
                    class="form-control @error('price') is-invalid @enderror"
                    name="price"
                    value="{{ old('price') ?? $post->price }}"
                    >   
                    @error('price')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label">{{ __('Location') }}</label>
            <input id="location" 
                    type="location"
                    class="form-control @error('location') is-invalid @enderror"
                    name="location"
                    value="{{ old('location') ?? $post->location }}"
                    >   
                    @error('location')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="row">
            <label for="image" class="col-md-4 col-form-label">{{ __('Post Image') }}</label>
            <input type="file" class="form-control-file" id="image" name="image"
                   value="{{ old('image') ?? $post->image }}"
                    >
                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>
        <div class='d-flex justify-content-between'>
                <div class="row pt-4">
                        <input type="submit" value="Save Post" name="form_post_save" >
                </div>
        </div>
    </div>
</form>



   
</div>
@endsection
