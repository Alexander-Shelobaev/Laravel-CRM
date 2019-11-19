@extends('layouts.admin')
@section('title', 'Редактирование сервиса')
@push('css')
	<link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')
<div class="panel panel-inverse">
	<div class="panel-body">


<ol class="breadcrumb pull-right">
	<li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
	<li class="breadcrumb-item active"><a href="/admin">Редактирование сервиса</a></li>
</ol>

<h1 class="page-title">Редактирование сервиса</h1>

<form action="{{ route('services.update', $value) }}" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Заголовок <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="title" name="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="@if(old('title')){{ old('title') }}@else{{$value->title ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('title'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('title') }}</strong>
		</span>
		@endif
	</div>
	<div class="form-group">
		<label for="alias">Псевдоним <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="alias" name="alias" type="text" class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" value="@if(old('alias')){{ old('alias') }}@else{{$value->alias ?? ''}}@endif">
		@if ($errors->has('alias'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('alias') }}</strong>
		</span>
		@endif
	</div>

	<hr>

	<div class="form-group">
		<label for="short_text">Краткое описание <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="short_text" name="short_text" type="text" class="form-control{{ $errors->has('short_text') ? ' is-invalid' : '' }}" value="@if(old('short_text')){{ old('short_text') }}@else{{$value->short_text ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('short_text'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('short_text') }}</strong>
		</span>
		@endif
	</div>	

	<div class="form-group">
		<label for="img">Изображение <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="img" name="img" type="text" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" value="@if(old('img')){{ old('img') }}@else{{$value->img ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('img'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('img') }}</strong>
		</span>
		@endif
	</div>	

	<div class="form-group">
		<label for="description">Описание</label>
		<textarea id="description" name="description" rows="12" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" >@if(old('description')){{ old('description') }}@else{{$value->description ?? ''}}@endif</textarea>
		@if ($errors->has('description'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('description') }}</strong>
		</span>
		@endif
	</div>

	<hr>

	<div class="form-group">
		<label for="created_at">Дата создания записи</label>
		<input id="created_at" name="created_at" type="text" class="form-control{{ $errors->has('created_at') ? ' is-invalid' : '' }}" placeholder="Пример: 2000-12-31 23:59:59" value="@if(old('created_at')){{ old('created_at') }}@else{{$value->created_at ?? ''}}@endif">
		@if ($errors->has('created_at'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('created_at') }}</strong>
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