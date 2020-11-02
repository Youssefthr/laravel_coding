@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 p-5">
       <img src="/svg/BigLogo.svg" style="width: 90%;" alt="logo">
       </div>
       <div class="col-9 pt-5">
       <div class="d-flex justify-content-between align-items-baseline"> 
            <div><h1>{{ $user->nickname }}</h1></div>
            <a href="/post/create"> ADD NEW POST</a>
        </div> 
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
            </div>
            <div class="pt-4 font-weight-bold"> {{ $user->profile->title }} </div>
            <div> {{ $user->profile->description }} </div>
            <div><a href="#"> {{ $user->profile->url }} </a></div>
       </div>

       <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4"> <img src="/storage/{{ $post->image }}" class="w-100" alt="post image"> </div>  
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>     
        @endforeach
       </div>
   </div>
</div>
@endsection
