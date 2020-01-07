@extends('layouts.empty')

@section('title', 'Login Page')
@section('description', '')

@section('content')

@guest
<div class="login bg-black animated fadeInDown">
	<!-- begin brand -->
	<div class="login-header">
		<div class="brand">
			<span class="logo"></span> <b>Авторизация</b> 
			<small>Для входа в ЛК выполните авторизацию</small>
		</div>
		<div class="icon">
			<i class="fa fa-lock"></i>
		</div>
	</div>
	<!-- end brand -->
	<div class="login-content">
		<form action="{{ route('login') }}" method="POST" class="margin-bottom-0">
			<div class="form-group m-b-20">
				<label for="email" class="">{{ __('E-Mail Address') }}</label>
				<input id="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
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
			<div class="checkbox checkbox-css m-b-20">
				<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				<label class="form-check-label" for="remember">Запомни меня</label>
			</div>
			<div class="login-buttons">
				<button type="submit" class="btn btn-success btn-block btn-lg">Войти</button>
			</div>

			@if (Route::has('register'))
			<div class="m-t-20">
				Еще не зарегистрированы? Нажмите <a href="{{ route('register') }}">здесь</a>, чтобы зарегистрироваться.
			</div>
			@endif

			@if (Route::has('password.request'))
			<div class="m-t-20">
				<a class="" href="{{ route('password.request') }}">Забыли пароль?</a>
			</div>
			@endif

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



