@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class='loginForm2'>



<h2>新規ユーザー登録</h2>
<div class ='text'>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if ($errors->has('username'))
{{$errors->first('username')}}
@endif
</div>

<div class ='text'>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))
{{$errors->first('mail')}}
@endif
</div>

<div class ='text'>
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
@if ($errors->has('password'))
{{$errors->first('password')}}
@endif
</div>

<div class ='text'>
{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
@if ($errors->has('password'))
{{$errors->first('password')}}
@endif
</div>


{{ Form::submit('登録',['class' =>'btn2']) }}

<p><a href="/login" class ='aaa'>ログイン画面へ戻る</a></p>

{!! Form::close() !!}

</div>
@endsection
