@extends('layouts.admin')
@section('title', 'Редактирование новости')
@push('css')
	<link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')
<div class="panel panel-inverse">
	<div class="panel-body">


<ol class="breadcrumb pull-right">
	<li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
	<li class="breadcrumb-item active"><a href="/admin">Редактирование новости</a></li>
</ol>

<h1 class="page-title">Редактирование новости</h1>

<form action="{{ route('news.update', $value) }}" method="post" enctype="multipart/form-data">

	
	<div class="form-group">
		<label for="headline">Заголовок <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="headline" name="headline" type="text" class="form-control{{ $errors->has('headline') ? ' is-invalid' : '' }}" value="@if(old('headline')){{ old('headline') }}@else{{$value->headline ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('headline'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('headline') }}</strong>
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
		<label for="desc_announce">Описание для анонса <span class="text-theme">*</span> <br>
			<small>Текст длиною не более 255 символов</small>
		</label>
		<input id="desc_announce" name="desc_announce" type="text" class="form-control{{ $errors->has('desc_announce') ? ' is-invalid' : '' }}" value="@if(old('desc_announce')){{ old('desc_announce') }}@else{{$value->desc_announce ?? ''}}@endif" autofocus><!-- удалить!!!!!!!!!! required -->
		@if ($errors->has('desc_announce'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('desc_announce') }}</strong>
		</span>
		@endif
	</div>	

	<div class="form-group">
		<label for="old_picture_announce">Текущее изображение анонса <!-- под названием: {{ $value->picture_announce }}--></label>
		<input id="old_picture_announce" name="old_picture_announce" type="hidden" value="{{ $value->picture_announce }}">
	</div>

	<img class="old_picture_announce" src="{{asset('/assets-landing/img')}}/{{ $value->picture_announce }}" alt="{{ $value->headline }}" />

	<div class="form-group">
		<label for="picture_announce">Новое изображение для анонса <br>
			<small>Файл будет преобразован в изображение размером 436х327 px</small></label>
		<div id="picture_announce" name="picture_announce" class="input-group input-file-picture-announce">
			<input type="text" class="form-control{{ $errors->has('picture_announce') ? ' is-invalid' : '' }}" placeholder='Выберите файл' />
			<div class="input-group-append">
				<button type="button" class="btn btn-success btn-choose-picture-announce">Выбрать</button>
			</div>	
			@if ($errors->has('picture_announce'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('picture_announce') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<hr>

	<div class="form-group">
		<label for="old_detailed_picture">Текущее изображение для детального описания <!--под названием: {{ $value->detailed_picture }}--></label>
		<input id="old_detailed_picture" name="old_detailed_picture" type="hidden" value="{{ $value->detailed_picture }}">
	</div>
	<img class="old_detailed_picture" src="{{asset('/assets-landing/img')}}/{{ $value->detailed_picture }}" alt="{{ $value->headline }}" />
	<div class="form-group">
		<label for="detailed_picture">Новое изображение для детального описания<br>
			<small>Файл будет преобразован в изображение размером 1140х500 px</small></label>
		<div id="detailed_picture" name="detailed_picture" class="input-group input-file-detailed-picture">
			<input type="text" class="form-control{{ $errors->has('detailed_picture') ? ' is-invalid' : '' }}" placeholder='Выберите файл' />
			<div class="input-group-append">
				<button type="button" class="btn btn-success btn-choose-detailed-picture">Выбрать</button>
			</div>	
			@if ($errors->has('detailed_picture'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('detailed_picture') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group">
		<label for="detailed_desc">Детальное описание</label>
		<textarea id="detailed_desc" name="detailed_desc" rows="12" class="form-control{{ $errors->has('detailed_desc') ? ' is-invalid' : '' }}" >@if(old('detailed_desc')){{ old('detailed_desc') }}@else{{$value->detailed_desc ?? ''}}@endif</textarea>
		@if ($errors->has('detailed_desc'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('detailed_desc') }}</strong>
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
	<button type="submit" class="btn btn-lime"><i class="fas fa-save"></i> Сохранить</button>
	
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
function bs_input_file_detailed_picture() {
	$(".input-file-detailed-picture").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose-detailed-picture").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file-detailed-picture").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file-detailed-picture').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
		bs_input_file_detailed_picture();
});
</script>
@endpush