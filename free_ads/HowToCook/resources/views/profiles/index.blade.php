@extends('layouts.app')

@section('content')
<div class="container .flex-wrap">
   <div class="row">
       <div class="col-lg-3 col-md-4">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" alt="logo">
       </div>
       <div class="col-lg-9 col-md-6 col-sm-3 pt-5">
       <div class="d-flex justify-content-between align-items-baseline"> 
@if($user->id == $me->id || $me->is_admin == "yes")
            <div>
               <a href="/post/create"> ADD NEW POST</a>
            </div> 
            <div class='d-flex align-items-start'>
                <a class="pt-2" href="/profile/{{ $user->id }}/edit"> EDIT PROFIL</a>
            </div>
            <form method="POST" action="/profile/{{ $user->id }}">
                @csrf
                @method('DELETE')
                <div class="form-group, mb-2 ml-3 pt-0">
                    <input type="submit" class="btn" style="color:red" value="DELETE PROFIL" onclick="return confirm('Are you sure you want to delete this item?');">
                </div>
            </form>
@endif
        </div>
        <div class="d-flex">
            <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
            <div class="pr-5"><strong>23k</strong> followers</div>
        </div>
        <div class="pt-4 font-weight-bold"> {{ $user->profile->title }} </div>
        <div> {{ $user->profile->description }} </div>
        <div><a href="#"> {{ $user->profile->url }} </a></div>
    </div>

    <div class="d-flex flex-wrap pt-5">
            @foreach($user->posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-8 pl-3 .align-self-*-start">
                        <div class="pb-2 pl-0"> <img src="/storage/{{ $post->image }}" class="w-100 image_post" alt="post image"> </div>  
                            <div>
                                <div class="pb-2 " style="font-size:20px">{{ $post->caption }} by <span style="color:#3490dc"> {{ $post->user->nickname }} </span></div>
                                <div class="d-flex flex-column align-items-start justify-content-between">
                                    <div class="pb-2">{{ $post->category }}</div>
                                    <div class="pb-2">{{ $post->description }}</div>
                                    <div class="pb-2"> PRICE : {{ $post->price }} €</div>
                                    <div class="pb-0 mb-3"><i class="material-icons pr-2">&#xe55f;</i> {{ $post->location }}</div>  
                                
                                    @if($user->id == $me->id || $me->is_admin == "yes")
                                    <div class="d-flex flex-row">
                                        <div class="pr-3 pb-3"> <a href="/post/{{ $post->id }}/{{ $user->id }}/edit" class="btn btn-primary btn-sm">EDIT POST</a></div>
                                        <form method="POST" action="/post/{{ $post->id }}/{{ $post->user_id }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger delete-user btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" value="DELETE POST">
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                    </div>
            @endforeach
        </div>
   </div>
</div>
@endsection
