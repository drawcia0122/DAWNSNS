@extends('layouts.login')

@section('content')

<div class="bigList">

<p class="h2">FollowList</p>

<div class="list">
@foreach($followlists as $followlist)



<a href="/profile/{{$followlist->id}}"><img src="{{asset('images/'.$followlist->images)}}" alt="アイコン" class="icon"></a>


@endforeach
</div>
</div>



<table class='table table-hover'>

    @foreach ($lists as $list)

            <tr class="timeline">



                <td class="iconKing"><img class="icon6" src="{{asset('images/'.$list->images)}}" alt="アイコン"></a></td>
                <td>
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
