@extends('layouts.app')

@section('content')

<div class="container .flex-*-wrap">

    <div class="d-flex justify-content-between align-items-baseline">
        <div class="col-3">
            <img src="/svg/BigLogo.svg" style="width: 80%;" alt="logo">
        </div>
        <!-- Search form -->
        <form action="/search" method="POST" role="search" style="width: 100%;">
                {{ csrf_field() }}
               
                    <input type="text" class="form-control" name="q"
                        placeholder="Search cooking lessons !" size="100%"> 
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
     
            </form>
    </div>
    <div class="pt-5"> <h3> The Search results for your query <b> {{ $query }} </b> are :</h3></div>
   <div class="row">
       <div class="row pt-5">
            @if(isset($details))
                    @foreach($details as $post)
                        <div class="col-4  pl-3 .align-self-*-start">
                            <div class="pb-2 pl-0"> <img src="/storage/{{ $post->image }}" class="w-100" alt="post image"> </div>  
                                <div>
                                    <div class="pb-2" style="font-size:20px">
                                        {{ $post->caption }} by 
                                        <a style="color:#3490dc" href="/profile/{{ $post->user_id }}">{{ $post->user->nickname }}</a>
                                     </div>
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div>
                                            <div class="pb-2">{{ $post->category }}</div>
                                            <div class="pb-2">{{ $post->description }}</div>
                                            <div class="pb-2"> PRICE : {{ $post->price }} €</div>
                                            <div class="pb-0 mb-3"><i class="material-icons pr-2">&#xe55f;</i> {{ $post->location }}</div>  
                                        </div>
                                        @auth
                                            <div class="pr-3 pb-3"> <a href="/profile/{{ $post->user_id }}" class="btn btn-primary">Ready to Cook !</a></div>           
                                        @else
                                            <div class="pr-3 pb-3"> <a href="{{ route('register') }}" class="btn btn-primary">Ready to Cook !</a></div>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    @endforeach
            @endif
       </div>
   </div>
</div>

@endsection


