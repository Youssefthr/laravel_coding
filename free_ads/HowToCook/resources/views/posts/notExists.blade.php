@extends('layouts.app')

@section('content')

<div class="container .flex-*-wrap">

    <div class="d-flex justify-content-between align-items-baseline">
        <div class="col-3">
            <img src="/svg/BigLogo.svg" style="width: 80%;" alt="logo">
        </div>
        <!-- Search form -->
        <div>
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
    </div>
            

   <div class="row">
       <div class="row pt-5">
        <div>
        Sorry, their is no result (yet) for your request ! But try another one ! 
        </div>
       </div>
   </div>
</div>

@endsection


