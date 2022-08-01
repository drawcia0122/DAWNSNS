@extends('layouts.logout')

@section('content')

<div class="loginForm3">
  <div class="p1">
<div class="p1B">
<p>{{session('username')}}さん、</p>
</div>
<p>ようこそ！DAWNSNSへ！</p>

</div>

<div class="p2">
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう。</p>
</div>

<p class="btn3"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
