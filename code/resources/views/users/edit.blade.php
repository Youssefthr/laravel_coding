@extends('layouts.app')

@section('content')
<div class="container">
<form action='/users/{{ $users->id }}/patch' method="get" enctype="multipart/form-data">
{{--protect your application from cross-site request forgery (CSRF) attacks--}}
@csrf
@method('PATCH')
    <div class="col-8 offset-2">
        <div class="row"><h2>Edit User</h2></div>


       
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
            <input id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') ?? $users->name }}"
                    >
        
                    @error('name')
                            <strong>{{ $message }}</strong>
                    @enderror
        </div>
        <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">{{ __('Token') }}</label>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label">{{ __('password') }}</label>
            <input id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    value="{{ old('password') ?? $users->password }}"
                    >
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
                    value="{{ old('email') ?? $users->email }}">
                    @error('email')
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
