@extends('layouts.admin')
@section('title', 'Редактирование пользователя')
@push('css')
	<link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')


<ol class="breadcrumb pull-right">
	<li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
	<li class="breadcrumb-item active"><a href="/admin">Редактирование пользователя</a></li>
</ol>

<h1 class="page-title">Редактирование пользователя</h1>

<form action="{{ route('users.update', $value) }}" method="post" enctype="multipart/form-data">

	{{ method_field('put') }} 
	<div class="form-group">
		<label for="name">Логин <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="@if(old('name')){{ old('name') }}@else{{$value->name ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('name'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('name') }}</strong>
		</span>
		@endif
	</div>
	<div class="form-group">
		<label for="email">Email <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="@if(old('email')){{ old('email') }}@else{{$value->email ?? ''}}@endif">
		@if ($errors->has('email'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
		@endif
	</div>
	
	<div class="form-group">
		<label for="password">Пароль<br>
			<small>При пустом поле пароль не измениться. Для изменения пароля введите минимум 8 символов</small>
		</label>
		<input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
		@if ($errors->has('password'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('password') }}</strong>
		</span>
		@endif
	</div>
	<div class="form-group">
		<label for="password_confirmation">Подтверждение пароля</label>
		<input id="password_confirmation" name="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" value="{{ old('password_confirmation') }}">
		@if ($errors->has('password_confirmation'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('password_confirmation') }}</strong>
		</span>
		@endif
	</div>
	

	{{ csrf_field() }} 
	<button type="submit" class="btn btn-lime"><i class="fas fa-plus-circle"></i> Добавить</button>
	
</form>
<br>
@if (session('status'))
<div class="alert alert-success"> {{ session('status') }} </div>
@endif

@if (count($errors))
<div class="alert alert-danger"> 
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif





@endsection
@push('scripts')
<script src="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
	$('#detailed_desc').wysihtml5({
		toolbar: {
			"font-styles": true, // Font styling, e.g. h1, h2, etc.
			"emphasis": true, // Italics, bold, etc.
			"lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
			"html": true, // Button which allows you to edit the generated HTML.
			"link": true, // Button to insert a link.
			"image": false, // Button to insert an image.
			"color": false, // Button to change color of font
			"blockquote": true, // Blockquote
			"fa": true, // Use Awesome Icon
		}
	});
</script>
<script type="text/javascript">
function bs_input_file_picture_announce() {
	$(".input-file-picture-announce").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose-picture-announce").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file-picture-announce").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file-picture-announce').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
		bs_input_file_picture_announce();
});
</script>
@endpush