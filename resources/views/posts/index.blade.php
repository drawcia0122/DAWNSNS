@extends('layouts.login')

@section('content')


  <div class='container'>

  <div class="tweetForm">

<a href="/mypage" class='tweetIcon'><img class="icon" src="images/{{Auth::user()->images}}" alt="アイコン"></a>

<form action="/tweet" method="POST" class='tweetInput'>
  @csrf
  <input type="text" name="tweet" placeholder="今何してる？" class='inputinput'>
  <input type="image" src="/images/post.png" class='tweetBtn'>
</form>
</div>

        <table class='table table-hover'>

            @foreach ($lists as $list)



            <tr class="timeline">



                <td><a href="/profile/{{$list->user_id}}" ><img class="icon6" src="images/{{$list->images}}" alt="アイコン"></a></td>
                <td>
                  <div>
                    <p class="username">{{ $list->username }}</p>
                    <p class="post">{{ $list->posts }}</p>
                  </div>
                </td>
                <td>
                  <div class='time'>
                    <p>{{ $list->updated_at }}</p>
                    <p class='updeli'>
                      @if ($list->user_id === Auth::id())
                        <a href="" class="modalopen" data-target="{{$list->id}}" ><img src="images/edit.png" alt=""></a>

                        <a href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                          <img src="images/trash.png" alt="" >
                        </a>

                      @endif
                    </p>
                  </div>
                </td>


            </tr>



<!-- ここからモーダルの中身 -->
     <div class="modal-main js-modal" id="{{$list->id}}">

        <div class="modal-inner">
            <div class="inner-content">

         <div class="form-group">

         {!! Form::open(['url' => '/post/update']) !!}

            {!! Form::hidden('id', $list->id) !!}
            {!! Form::text('upPost', $list->posts, ['required', 'class' => 'form-control']) !!}

            <button type="submit" class="updateButton"><img src="images/edit.png" alt="" ></button>
        {!! Form::close() !!}
        <div><p class="modalClose">閉じる</p></div>

         </div>
        </div>
     </div>
     </div>
<!-- ここまで -->

            @endforeach
        </table>
    </div>

    <div><a href="/test">aaaaaa</a></div>



@endsection
