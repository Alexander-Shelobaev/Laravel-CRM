@extends('layouts.admin')
@section('title', 'Редактирование валюты')
@push('css')
	<link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')
<div class="panel panel-inverse">
	<div class="panel-body">


<ol class="breadcrumb pull-right">
	<li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
	<li class="breadcrumb-item active"><a href="/admin">Редактирование валюты</a></li>
</ol>

<h1 class="page-title">Редактирование валюты</h1>

<form action="{{ route('currencies.update', $value) }}" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="name_currency_en">Название валюты на английском языке <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="name_currency_en" name="name_currency_en" type="text" class="form-control{{ $errors->has('name_currency_en') ? ' is-invalid' : '' }}" value="@if(old('name_currency_en')){{ old('name_currency_en') }}@else{{$value->name_currency_en ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('name_currency_en'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('name_currency_en') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="name_currency_ru">Название валюты на русском языке <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="name_currency_ru" name="name_currency_ru" type="text" class="form-control{{ $errors->has('name_currency_ru') ? ' is-invalid' : '' }}" value="@if(old('name_currency_ru')){{ old('name_currency_ru') }}@else{{$value->name_currency_ru ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('name_currency_ru'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('name_currency_ru') }}</strong>
		</span>
		@endif
	</div>
	
	<div class="form-group">
		<label for="iso_4217_code_currency_literal">Код ISO 4217 буквенный для данной валюты <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 4 символов</small>
		</label>
		<input id="iso_4217_code_currency_literal" name="iso_4217_code_currency_literal" type="text" class="form-control{{ $errors->has('iso_4217_code_currency_literal') ? ' is-invalid' : '' }}" value="@if(old('iso_4217_code_currency_literal')){{ old('iso_4217_code_currency_literal') }}@else{{$value->iso_4217_code_currency_literal ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('iso_4217_code_currency_literal'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('iso_4217_code_currency_literal') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="iso_4217_code_currency_numeric">Код ISO 4217 цифровой для данной валюты <span class="text-theme">*</span> <br>
			<small>Число, значением не более 999</small>
		</label>
		<input id="iso_4217_code_currency_numeric" name="iso_4217_code_currency_numeric" type="number" class="form-control{{ $errors->has('iso_4217_code_currency_numeric') ? ' is-invalid' : '' }}" value="@if(old('iso_4217_code_currency_numeric')){{ old('iso_4217_code_currency_numeric') }}@else{{$value->iso_4217_code_currency_numeric ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('iso_4217_code_currency_numeric'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('iso_4217_code_currency_numeric') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="rounding_currency">Величина (кол-во знаков после запятой), до которой округляется валюты <span class="text-theme">*</span> <br>
			<small>Число длиною не более 4 символов</small>
		</label>
		<input id="rounding_currency" name="rounding_currency" type="number" class="form-control{{ $errors->has('rounding_currency') ? ' is-invalid' : '' }}" value="@if(old('rounding_currency')){{ old('rounding_currency') }}@else{{$value->rounding_currency ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('rounding_currency'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('rounding_currency') }}</strong>
		</span>
		@endif
	</div>

	<!--<div class="form-group">
		<label for="method_rounding_currency">Признак метода округления (0 - округление не производится, 1 - производится)  <br>
			<small>Число длиною не более 1 символа</small>
		</label>
		<input id="method_rounding_currency" name="method_rounding_currency" type="number" class="form-control{{ $errors->has('method_rounding_currency') ? ' is-invalid' : '' }}" value="@if(old('method_rounding_currency')){{ old('method_rounding_currency') }}@else{{$value->method_rounding_currency ?? ''}}@endif" autofocus>
		@if ($errors->has('method_rounding_currency'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('method_rounding_currency') }}</strong>
		</span>
		@endif
	</div>-->

	<div class="form-group">
		<label for="unicode">Знак валюты в формате юникод  <br>
			<small>Текст длиною не более 10 символов</small>
		</label>
		<input id="unicode" name="unicode" type="text" class="form-control{{ $errors->has('unicode') ? ' is-invalid' : '' }}" value="@if(old('unicode')){{ old('unicode') }}@else{{$value->unicode ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('unicode'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('unicode') }}</strong>
		</span>
		@endif
	</div>

	{{ method_field('put') }}
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