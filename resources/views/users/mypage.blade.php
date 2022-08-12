@extends('layouts.login')

@section('content')


<div class="boss">

<tr><img src="/images/{{$profile->images}}" alt="アイコン" class="icon4"></tr>

<div class="formForm">

 <form action="/profileUpdate" method="POST" enctype="multipart/form-data" >

    @csrf

    <div>
     <div class="tr">
      UserName
     </div>
     <input type="text" name="username" value="{{ $profile->username }}">
      @if ($errors->has('username'))
     <tr>{{$errors->first('username')}}</tr>
    @endif
    </div>



    <div>
     <div class="tr">
      MailAdress
      </div>
      <input type="email" name="mail" value="{{ $profile->mail }}"></tr>
     @if ($errors->has('mail'))
     <tr>{{$errors->first('mail')}}</tr>
     @endif
    </div>



    <div>
     <div class="tr">
      password
      </div>
      <input type="password" value="{{$profile->password}}" disabled></tr>
    </div>


  <div>
     <div class="tr">
      new password
      </div>
      <input type="password" name='password'>
    @if ($errors->has('password'))
     <tr>{{$errors->first('password')}}</tr>
    @endif
    </div>


    <div>
     <div class="tr">
      BIO
      </div>
      <input type="text" value="{{ $profile->bio }}" name="bio" ></tr>

    </div>


    <div>
     <div class="tr">
      icon image
      </div>
      <input type="file" name="images" ></tr>
    </div>


    <div>
        <input type="submit" value="更新">
    </div>





 </form>
</div>
</div>


@endsection
