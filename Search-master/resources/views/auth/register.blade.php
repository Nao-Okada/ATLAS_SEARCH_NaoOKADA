@extends('layouts.logout')

@section('content')

<!-- change code when error has occurred -->
@if ($errors->any())
<div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
           @endforeach
        </ul>
</div>
@endif

{!! Form::open(['url' => '/register']) !!}

<h2 class="register">Register</h2>

<div class="register-content">
  <!-- required items  -->
  <div class="name-group">
    <h3 class="form-label">USERNAME</h3>
    <div class="flexStyle">
      <div class="family username">
        {{ Form::label('Family') }}
        {{ Form::text('last',null,['class' => 'input']) }}
      </div>
      <div class="first username">
        {{ Form::label('First') }}
        {{ Form::text('first',null,['class' => 'input']) }}
      </div>
    </div>
    <h3 class="form-label">KANA</h3>
    <div class="flexStyle">
      <div class="family username">
        {{ Form::label('Family') }}
        {{ Form::text('last_kana',null,['class' => 'input']) }}
      </div>
      <div class="first username">
        {{ Form::label('First') }}
        {{ Form::text('first_kana',null,['class' => 'input']) }}
      </div>
    </div>
  </div>

  <div class="date-group">
    <h3 class="form-label">BIRTHDAY</h3>
    <div class="flexStyle{{ $errors->has('birth') || $errors->has('birth_year') || $errors->has('birth_month') || $errors->has('birth_day') ? ' has-error' : '' }}">
      <div class="birth_year date">
        {{ Form::label('Year') }}
        {{ Form::text('birth_year',null,['class' => 'input']) }}
      </div>
      <div class="birth_month date">
        {{ Form::label('Month') }}
        {{ Form::text('birth_month',null,['class' => 'input']) }}
      </div>
      <div class="birth_day date">
        {{ Form::label('DAY') }}
        {{ Form::text('birth_day',null,['class' => 'input']) }}
      </div>
    </div>
    <h3 class="form-label">ADMINISTERED</h3>
    <div class="flexStyle">
      <div class="admission_year date">
        {{ Form::label('Year') }}
        {{ Form::text('admission_year',null,['class' => 'input']) }}
      </div>
      <div class="admission_month date">
        {{ Form::label('Month') }}
        {{ Form::text('admission_month',null,['class' => 'input']) }}
      </div>
      <div class="admission_date date">
        {{ Form::label('Day') }}
        {{ Form::text('admission_date',null,['class' => 'input']) }}
      </div>
    </div>
  </div>

  <div class="gender-group">
    <label for="gender">Gender</label>
    <div class="flexStyle">
      <div class="male-box">
          <input id="gender-m" type="radio" name="gender" value="0">
          <label for="gender-m">Male</label>
      </div>
      <div class="female-box">
          <input id="gender-f" type="radio" name="gender" value="1">
          <label for="gender-f">Female</label>
      </div>
    </div>
  </div>

  <div class="mail-group others">
    {{ Form::label('MailAddress') }}
    {{ Form::text('email',null,['class' => 'input']) }}
  </div>

  <div class="password-group others">
    {{ Form::label('Password') }}
    {{ Form::text('password',null,['class' => 'input']) }}

    {{ Form::label('Password Confirm') }}
    {{ Form::text('password_confirmation',null,['class' => 'input']) }}
  </div>

  <!-- free option -->
  <div class="role-group">
    <label for="status">Status</label>
    <div class="flexStyle">
      <div class="jpn-teacher-box">
        <input id="role-j-teacher" type="radio" name="role" value="0">
        <label for="role-j-teacher">Japanese teacher</label>
      </div>
      <div class="math-teacher-box">
        <input id="role-m-teacher" type="radio" name="role" value="5">
        <label for="role-m-teacher">Math teacher</label>
      </div>
      <div class="student-box">
        <input id="role-s" type="radio" name="role" value="10">
        <label for="role-s">Student</label>
      </div>
    </div>
  </div>

  <div class="charge-group">
    <label for="jp-charge">Teacher of JAPANESE</label>
    @foreach($user as $japaneseTeacher)
    <div class="jpn-teacher">
      @if ($japaneseTeacher->role == 0)
    <div class="flexStyle">
      <div class="select-teacher">
        <input id="japanese_language_user" type="radio" name="japanese_language_user_id" value="{{$japaneseTeacher->id}}">
      <label for="japanese_language_user">{{ $japaneseTeacher->username }}</label>
      </div>
    </div>
      @endif
    </div>
    @endforeach

    <label for="math-charge">Teacher of MATH</label>
    @foreach($user as $mathTeacher)
    <div class="math-teacher">
      @if ($mathTeacher->role == 5)
      <input id="math_teacher_user" type="radio" name="math_teacher_user_id" value="{{$mathTeacher->id}}">
      <label for="math_teacher_user">{{ $mathTeacher->username }}</label>
      @endif
    </div>
    @endforeach
  </div>

  {{ Form::submit('CONFIRM', ['class' => 'submit']) }}
</div>

<div class="move">
  <p class="moveBtn"><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}


@endsection
