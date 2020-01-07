@extends('layouts.empty')

@section('title', 'Регистрация')
@section('description', '')

@section('content')

@guest
<div class="login bg-black animated fadeInDown">

  <!-- begin brand -->
  <div class="login-header">
    <div class="brand">
      <span class="logo"></span> <b>Регистрация </b>
      <small>Пройдите регистрацию для получения доступа в ЛК</small>
    </div>
    <div class="icon">
      <i class="fa fa-lock"></i>
    </div>
  </div>
  <!-- end brand -->

  <div class="login-content">
    <form action="{{ route('register') }}" method="POST" class="margin-bottom-0">
      <div class="form-group m-b-20">
        <label for="name" class="">{{ __('Name') }}</label>
        <input id="name" class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group m-b-20">
        <label for="email" class="">{{ __('E-Mail Address') }}</label>
        <input id="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group m-b-20">
        <label for="password" class="">{{ __('Password') }}</label>
        <input id="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required />
        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group m-b-20">
        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" class="form-control form-control-lg" type="password" name="password_confirmation" required />
      </div>

      <div class="login-buttons">
        <button type="submit" class="btn btn-success btn-block btn-lg">Зарегистрироваться</button>
      </div>

      @csrf
    </form>
  </div>

</div>

@else

<div class="login-content">
  <div class="m-t-20">
    Вы авторизованы как: {{ Auth::user()->name }}. Желаете выйти?
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST">
    <div class="login-buttons">
      <button type="submit" class="btn btn-success btn-block btn-lg">Выйти</button>
    </div>
    @csrf
  </form>
</div>
@endguest
@endsection
