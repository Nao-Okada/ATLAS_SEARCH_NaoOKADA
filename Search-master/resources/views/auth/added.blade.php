@extends('layouts.logout')

@section('content')

<div id="clear">
  <h2 class="welcome">WELCOME</h2>
  <p class="username"><span>{{ session('registered') }}</span>さん</p>
  <p class="thanks">Thank you for registering!</p>

  <p class="moveBtn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
