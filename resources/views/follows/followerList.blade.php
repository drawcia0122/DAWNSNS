@extends('layouts.login')

@section('content')

<div class="bigList">

<p class="h2">FollowerList</p>
<div class="list">

@foreach($followerlists as $followerlist)

<a href="/profile/{{$followerlist->id}}"><img src="{{asset('images/'.$followerlist->images)}}" alt="アイコン" class="icon"></a>

@endforeach
</div>
</div>



<table class='table table-hover'>

    @foreach ($lists as $list)

  <tr class="timeline">
    <td class="iconKing">
      <img class="icon6" src="{{asset('images/'.$list->images)}}" alt="アイコン">
    </td>
    <td  class="timeline2">
      <div>
        <p class="username">{{ $list->username }}</p>
        <p class="post">{{ $list->posts }}</p>
      </div>
    </td>
    <td class="timeKing">
      <div class='time'>
        <p>{{ $list->created_at }}</p>
      </div>
    </td>
  </tr>

    @endforeach

</table>

@endsection
