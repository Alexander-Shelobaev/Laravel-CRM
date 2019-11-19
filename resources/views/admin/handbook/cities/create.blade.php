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

<form action="{{ route('cities.store') }}" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="name_city_en">Название города на английском языке <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="name_city_en" name="name_city_en" type="text" class="form-control{{ $errors->has('name_city_en') ? ' is-invalid' : '' }}" value="@if(old('name_city_en')){{ old('name_city_en') }}@else{{$value->name_city_en ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('name_city_en'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('name_city_en') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="name_city_ru">Название города на русском языке <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="name_city_ru" name="name_city_ru" type="text" class="form-control{{ $errors->has('name_city_ru') ? ' is-invalid' : '' }}" value="@if(old('name_city_ru')){{ old('name_city_ru') }}@else{{$value->name_city_ru ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('name_city_ru'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('name_city_ru') }}</strong>
		</span>
		@endif
	</div>
	
	<div class="form-group">
		<label for="iata_code_city">IATA код города <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 4 символов</small>
		</label>
		<input id="iata_code_city" name="iata_code_city" type="text" class="form-control{{ $errors->has('iata_code_city') ? ' is-invalid' : '' }}" value="@if(old('iata_code_city')){{ old('iata_code_city') }}@else{{$value->iata_code_city ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('iata_code_city'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('iata_code_city') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="state_id">Ссылка на государство, в котором расположен город <br>
			<small>Число, значением не более 999</small>
		</label>
		<input id="state_id" name="state_id" type="number" class="form-control{{ $errors->has('state_id') ? ' is-invalid' : '' }}" value="@if(old('state_id')){{ old('state_id') }}@else{{$value->state_id ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('state_id'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('state_id') }}</strong>
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