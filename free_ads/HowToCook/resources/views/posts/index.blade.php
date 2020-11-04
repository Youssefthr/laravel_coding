@extends('layouts.app')

@section('content')
<div class="container .flex-*-wrap">

    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
        <img src="/svg/BigLogo.svg" style="width: 15%;" alt="logo">
    </div>
   <div class="row">
       <div class="row pt-5">
       @foreach($posts as $post)
                    <diV class="col-4  pl-3 .align-self-*-start">
                        <div class="pb-2 pl-0"> <img src="/storage/{{ $post->image }}" class="w-100" alt="post image"> </div>  
                            <div>
                                <div class="pb-2" style="font-size:20px">{{ $post->caption }} by <span style="color:#3490dc">{{ $post->user->nickname }} </span></div>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <div class="pb-2">{{ $post->category }}</div>
                                        <div class="pb-2">{{ $post->description }}</div>
                                        <div class="pb-2"> PRICE : {{ $post->price }} €</div>
                                        <div class="pb-0 mb-3"><i class="material-icons pr-2">&#xe55f;</i> {{ $post->location }}</div>  
                                    </div>
                                    @auth
                                        <div class="pr-3 pb-3"> <a href="mailto:{{ $post->user->email }}" class="btn btn-primary">Ready to Cook !</a></div>
                                    @else
                                        <div class="pr-3 pb-3"> <a href="{{ route('register') }}" class="btn btn-primary">Ready to Cook !</a></div>
                                    @endif
                                </div>
                            </div>
                    </div>
        @endforeach
       </div>
   </div>
</div>
@endsection



