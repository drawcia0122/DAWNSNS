@extends('layouts.login')

@section('content')



<div class="list">

            <tr class="">
                <td><img src="/images/{{$profile->images}}" alt="アイコン" class="icon"></td>
                <div class="profile2">

                  <div class="tr2">
                <td>
                    <div class="BIO">NAME</div>
                    <div class="BIO2">{{ $profile->username }}</div>
                </td>

                </div>


                <div class="tr2">
                  <td>
                    <div class="BIO">BIO </div>
                    <div class="BIO2">{{ $profile->bio }} </div>
                  </td>
                </div>
                </div>
                 @if(!in_array($profile->id,$number)) <!--!をつけると否定形になる-->
                <td><a href="/{{$profile->id}}/follow" class="btnBlue2">フォローする</a></td>
                @else
                <td><a href="/{{$profile->id}}/unfollow" class="btnRed2">外す</a></td>
                @endif
            </tr>

            </div>





<table>
@foreach ($lists as $list)


            <tr class="timeline">



                <td><a href="/profile/{{$list->user_id}}" ><img class="icon6" src="{{asset('images/'.$list->images)}}" alt="アイコン"></a></td>
                <td>
                  <div>
                    <p class="username">{{ $list->username }}</p>
                    <p class="post">{{ $list->posts }}</p>
                  </div>
                </td>
                <td>
                  <div class='time'>
                    <p>{{ $list->created_at }}</p>
                  </div>
                </td>


            </tr>


@endforeach
</table>

@endsection
