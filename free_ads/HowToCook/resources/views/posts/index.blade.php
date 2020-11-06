@extends('layouts.app')

@section('content')

<div class="container .flex-*-wrap">

    <div class="d-flex justify-content-between align-items-baseline">
        <div class="col-3">
            <img src="/svg/BigLogo.svg" style="width: 80%;" alt="logo">
        </div>
        <!-- Search form -->
        
    </div>

   <div class="row">
       <div class="row pt-5">

       @for($post=$page_index*9; $post<($page_index+1)*9; $post++)
                    @if(count($posts)>$post)
                    <diV class="col-4  pl-3 .align-self-*-start">
                        <div class="pb-2 pl-0"> <img src="/storage/{{ $posts[$post]->image }}" class="w-100" alt="post image"> </div>  
                            <div>

                                <div class="pb-2" style="font-size:20px">
                                    {{ $posts[$post]->caption }} by 
                                    <a style="color:#3490dc" href="/profile/{{ $posts[$post]->user_id }}">{{ $posts[$post]->user->nickname }}</a>
                                </div>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <div class="pb-2">{{ $posts[$post]->category }}</div>
                                        <div class="pb-2">{{ $posts[$post]->description }}</div>
                                        <div class="pb-2"> PRICE : {{ $posts[$post]->price }} €</div>
                                        <div class="pb-0 mb-3"><i class="material-icons pr-2">&#xe55f;</i> {{ $posts[$post]->location }}</div>  
                                    </div>
                                    @auth
                                        <div class="pr-3 pb-3"> <a href="/profile/{{ $posts[$post]->user_id }}" class="btn btn-primary">Ready to Cook !</a></div>           
                                    @else
                                        <div class="pr-3 pb-3"> <a href="{{ route('register') }}" class="btn btn-primary">Ready to Cook !</a></div>
                                    @endif
                                </div>
                            </div>
                    </div>
                @endif
            @endfor
       </div>
   </div>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    @for ($i=0; $i< ceil(count($posts)/9); $i++)
        <li class="page-item"><a class="page-link" href="/home/page{{ $i }}">{{ $i+1 }}</a></li>
    @endfor
  </ul>
</nav>
@endsection


