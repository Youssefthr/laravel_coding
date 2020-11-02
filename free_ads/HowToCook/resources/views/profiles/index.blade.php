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
            <a href="#"> ADD NEW POST</a>
        </div> 
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
            </div>
            <div class="pt-4 font-weight-bold"> {{ $user->profile->title }} </div>
            <div> {{ $user->profile->description }} </div>
            <div><a href="#"> {{ $user->profile->url }} </a></div>
       </div>
       <div class="col-4"> <img src="https://www.thespruceeats.com/thmb/D8Z5TyotuLMZAqzk0KicLUci75s=/960x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/paneer-makhani-or-shahi-paneer-indian-food-670906899-5878ef725f9b584db3d890f4.jpg" class="w-100" alt="Murgh musallam"> </div>
       <div class="col-4"> <img src="https://www.thespruceeats.com/thmb/7wpQlMH0HaFJUgM4hzbUmIYsYII=/960x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/chinese-pan-fried-dumplings-694499_dumpling-step-08-8a2fa534bd9a4802b9fafbe3f716a80e.jpg" class="w-100" alt="Serve with sauce" ></div>
       <div class="col-4"> <img src="https://www.expatica.com/app/uploads/sites/5/2020/03/French-onion-soup.jpg" class="w-100"  alt="French onion soup"> </div>
   </div>
</div>
@endsection
