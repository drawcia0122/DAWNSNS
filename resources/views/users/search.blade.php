@extends('layouts.login')

@section('content')

<div class="search">
  <div class="searchForm">
    <form action="{{ route('users.search') }}"  method="POST" > <!--名前付きルートをrouteで呼び出している-->
    @csrf
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif" class="searchInput">
        <input type="submit" value="検索">
        @if(isset($search)) {{ '検索結果:'.$search }} @endif
  </div>



</form>
</div>

<table class='table table-hover'>

            @foreach ($users as $user)

            <tr>
                <td><a href="/profile/{{$user->id}}"><img src="images/{{$user->images}}" alt="アイコン"  class="icon5"></a></td>
                <td>{{ $user->username }}</td>
                @if(!in_array($user->id,$numbers)) <!--!をつけると否定形になる-->
                <td><a href="/{{$user->id}}/follow" class="btnBlue">フォローする</a></td>
                @else
                <td><a href="/{{$user->id}}/unfollow" class="btnRed">外す</a></td>
                @endif
            </tr>

            @endforeach

</table>

@endsection
