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

        <div class="form-group row">
            <label for="login" class="col-md-4 col-form-label">{{ __('login') }}</label>
            <input id="login" 
                    type="login"
                    class="form-control @error('login') is-invalid @enderror"
                    name="login"
                    value="{{ old('login') ?? $user->login }}"
                    >   
                    @error('login')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label">{{ __('password') }}</label>
            <input id="password" 
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password">   
                    @error('password')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label">{{ __('email') }}</label>
            <input id="email" 
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') ?? $user->email }}">   
                    @error('email')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label">{{ __('phone') }}</label>
            <input id="phone" 
                    type="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    name="phone"
                    value="{{ old('phone') ?? $user->phone }}"
                    >   
                    @error('phone')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>

        <div class="form-group row">
            <label for="nickname" class="col-md-4 col-form-label">{{ __('nickname') }}</label>
            <input id="nickname" 
                    type="nickname"
                    class="form-control @error('nickname') is-invalid @enderror"
                    name="nickname"
                    value="{{ old('nickname') ?? $user->nickname }}"
                    >   
                    @error('nickname')
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

        <div class='d-flex justify-content-between'>
                <div class="row pt-4">
                        <input type="submit" value="Save Profile" name="form_profile_save" >
                </div>
        </div>

    </div>
</form>
   
</div>
@endsection
