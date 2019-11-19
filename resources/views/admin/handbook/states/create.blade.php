@extends('layouts.admin')
@section('title', 'Добавление пользователя')
@push('css')
	<link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')
<div class="panel panel-inverse">
	<div class="panel-body">


<ol class="breadcrumb pull-right">
	<li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
	<li class="breadcrumb-item active"><a href="/admin">Добавление пользователя</a></li>
</ol>

<h1 class="page-title">Добавление пользователя</h1>

<form action="{{ route('states.store') }}" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="name_state_en">Название валюты на английском языке <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="name_state_en" name="name_state_en" type="text" class="form-control{{ $errors->has('name_state_en') ? ' is-invalid' : '' }}" value="@if(old('name_state_en')){{ old('name_state_en') }}@else{{$value->name_state_en ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('name_state_en'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('name_state_en') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="name_state_ru">Название валюты на русском языке <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="name_state_ru" name="name_state_ru" type="text" class="form-control{{ $errors->has('name_state_ru') ? ' is-invalid' : '' }}" value="@if(old('name_state_ru')){{ old('name_state_ru') }}@else{{$value->name_state_ru ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('name_state_ru'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('name_state_ru') }}</strong>
		</span>
		@endif
	</div>
	
	<div class="form-group">
		<label for="iso_code_3_state">Код ISO 4217 буквенный для данной валюты <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 3 символов</small>
		</label>
		<input id="iso_code_3_state" name="iso_code_3_state" type="text" class="form-control{{ $errors->has('iso_code_3_state') ? ' is-invalid' : '' }}" value="@if(old('iso_code_3_state')){{ old('iso_code_3_state') }}@else{{$value->iso_code_3_state ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('iso_code_3_state'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('iso_code_3_state') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="iso_code_2_state">Код ISO 4217 цифровой для данной валюты <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 2 символов</small>
		</label>
		<input id="iso_code_2_state" name="iso_code_2_state" type="text" class="form-control{{ $errors->has('iso_code_2_state') ? ' is-invalid' : '' }}" value="@if(old('iso_code_2_state')){{ old('iso_code_2_state') }}@else{{$value->iso_code_2_state ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('iso_code_2_state'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('iso_code_2_state') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="currency_id">Величина (кол-во знаков после запятой), до которой округляется валюты <br>
			<small>Число, значением не более 999</small>
		</label>
		<input id="currency_id" name="currency_id" type="number" class="form-control{{ $errors->has('currency_id') ? ' is-invalid' : '' }}" value="@if(old('currency_id')){{ old('currency_id') }}@else{{$value->currency_id ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('currency_id'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('currency_id') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="solid_currency_id">Знак валюты в формате юникод  <br>
			<small>Число, значением не более 999</small>
		</label>
		<input id="solid_currency_id" name="solid_currency_id" type="number" class="form-control{{ $errors->has('solid_currency_id') ? ' is-invalid' : '' }}" value="@if(old('solid_currency_id')){{ old('solid_currency_id') }}@else{{$value->solid_currency_id ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('solid_currency_id'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('solid_currency_id') }}</strong>
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





	</div>
</div>
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