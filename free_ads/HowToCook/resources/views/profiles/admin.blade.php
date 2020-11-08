@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Login</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Phone number</th>
      <th scope="col">Is admin</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @for($i=$page_index*20; $i<($page_index+1)*20; $i++)
      @if(count($users)>$i)
          <td>{{ $users[$i]->id }}</td>
          <td>{{ $users[$i]->login }}</td>
          <td><a href='/profile/{{$users[$i]->id}}'>{{ $users[$i]->nickname }}</a></td>
          <td>{{ $users[$i]->email }}</td>
          <td>{{ $users[$i]->phone }}</td>
          <td>{{ $users[$i]->is_admin }}</td>
        </tr>
        @endif
    @endfor
  </tbody>
</table>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    @for ($i=0; $i< ceil(count($users)/20); $i++)
        <li class="page-item"><a class="page-link" href="/admin/page{{ $i }}">{{ $i+1 }}</a></li>
    @endfor
  </ul>
</nav>
@endsection


