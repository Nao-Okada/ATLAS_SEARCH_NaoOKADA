@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}

<p class="login">login</p>
<div class="form-content">
  {{ Form::label('e-mail') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('LOGIN',['class' => 'submit']) }}
</div>

<p class="moveBtn"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
