@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as an admin!') }}<br>
                    <div class="col-md-8 offset-md-4">
                        <a  href="{{ route('users.index') }}" type="submit" class="btn btn-success">
                            Manage Users
                        </a>
                        <a  href="{{ route('users.index') }}" type="submit" class="btn btn-success">
                            Manage Permissions
                        </a>
                    
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

