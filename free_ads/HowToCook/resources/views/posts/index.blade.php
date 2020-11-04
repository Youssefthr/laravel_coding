@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
                <diV class="col-4  pl-3 .align-self-*-start">
                    <div class="pb-2 pl-0"> <img src="/storage/{{ $post->image }}" class="w-100" alt="post image"> </div>  
                        <div>
                            <div class="pb-2" style="font-size:20px">{{ $post->caption }}</div>
                            <div class="pb-2">{{ $post->category }}</div>
                            <div class="pb-2">{{ $post->description }}</div>
                            <div class="pb-2"> PRICE : {{ $post->price }} €</div>
                            <div class="pb-5"><i class="material-icons pr-2">&#xe55f;</i> {{ $post->location }}</div>  
                        </div>
                </div>
    @endforeach
    
</div>
@endsection



