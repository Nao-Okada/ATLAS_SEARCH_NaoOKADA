@extends('layouts.login')

@section('content')
<div class="main-page">
  @foreach($users as $user)
  <div class="users-index">
    <div class="username">
      <p>{{ $user->username }}</p>
    </div>
    <div class="user-data">
      <div class="user-info">
        <p>Age：<span class="items">{{ $user->age }}</span></p>
        @if ($user->gender == 0)
        <p>male</p>
        @else
        <p>female</p>
        @endif
      </div>
      <p>Admitted at：<span class="items">{{$user->admission_date}}</span></p>
      <p>Birthday：<span class="items">{{$user->birthday}}</span></p>
      @if ($user->isJapaneseStudent($user->id))
      <p>Japanese Teacher：<span class="items">{{ $user->japaneseTeacher[0]->username }}</span></p>
      @endif
      @if ($user->isMathStudent($user->id))
      <p>Math Teacher：<span class="items">{{ $user->mathTeacher[0]->username }}</span></p>
      @endif
      @if ($user->role == 0)
      <p>Status：<span class="items">JAPANESE Teacher</span></p>
      @elseif ($user->role == 5)
      <p>Status：<span class="items">MATH Teacher</span></p>
      @else
      <p>Status：<span class="items">STUDENT</span></p>
      @endif
    </div>
  </div>
  @endforeach
</div>

@endsection
