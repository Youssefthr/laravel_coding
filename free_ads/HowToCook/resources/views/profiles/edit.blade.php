@extends('layouts.app')

@section('content')
<div class="container">
<form action='/profile/{{ $user->id }}' method="post" enctype="multipart/form-data">
{{--protect your application from cross-site request forgery (CSRF) attacks--}}
@csrf 
@method('PATCH')
    <div class="col-8 offset-2">
        <div class="row"><h2>Edit Profile</h2></div>

        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>
            <input id="title" 
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ old('title') ?? $user->profile->title }}"
                    required autocomplete="title" autofocus>   
                    @error('title')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>
            <input id="description" 
                    type="text"
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') ?? $user->profile->description }}"
                    >   
                    @error('description')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="url" class="col-md-4 col-form-label">{{ __('URL') }}</label>
            <input id="url" 
                    type="url"
                    class="form-control @error('url') is-invalid @enderror"
                    name="url"
                    value="{{ old('url') ?? $user->profile->url }}"
                    >   
                    @error('url')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="row">
            <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
            <input type="file" class="form-control-file" id="image" name="image"
                   value="{{ old('image') ?? $user->profile->image }}"
                    >
                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="row pt-4">
            <button class="btn btn-primary">Save Profile</button>

        </div>
    </div>
</form>
   
</div>
@endsection
