@extends('layouts.app')

@section('content')
<div class="container">

<form method="post" action='/post' enctype="multiple/form-data">
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
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
            <label for="image" class="col-md-4 col-form-label">{{ __('Post Image') }}</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row pt-4">
            <button class="btn btn-primary"> Add New Post</button>

        </div>
    </div>
</form>
    
</div>
@endsection



