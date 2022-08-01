@extends('layouts.logout')

@section('content')

<div class="loginForm">
{!! Form::open() !!}

<p>DAWNSNSへようこそ</p>

<div>
  {{ Form::label('Mailadress') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div>
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}
</div>
<div>
   {{ Form::submit('LOGIN',['class' => 'btn']) }}
</div>

<p ><a href="/register" class="register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

</div>
@endsection
