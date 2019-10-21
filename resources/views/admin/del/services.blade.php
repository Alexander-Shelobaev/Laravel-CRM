@extends('layouts.admin')

@section('title', 'Сервисы')

@section('content')

<div class="panel panel-inverse">
	<div class="panel-body">
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="/">Главная</a></li>
			<li class="breadcrumb-item"><a href="javascript:;">Специалист PHP. Уровень 2</a></li>
			<li class="breadcrumb-item active">Сервисы</li>
		</ol>
		
		<h1 class="page-title">Сервисы</h1>

<h4>Список сервисов</h4>
<style type="text/css">
	table {width: 100%;}
	td {padding: 4px 8px; border: 1px solid #333;}
</style>

<table id="data-table-combine" class="table table-striped table-bordered">
<!--<tr><th>title</th><th>alias</th></tr>-->
@foreach ($services as $value)
<tr>
	<td>{{ $value->title }}</td>
	<td>{{ $value->alias }}</td>
	<td>{{ $value->short_text }}</td>
	<td>{{ $value->description }}</td>
	<td><i class="fas fa-{{ $value->img }}"></i></td>
	<td>
		<a class="btn btn-success" href="{{ route('editService',[$value->id]) }}"><i class="fas fa-edit"></i> Редактировать</a>
	</td>
	<td>
		<form action="{{ route('deleteService',[$value->id]) }}" method="post">
			<input type="hidden" name="_method" value="DELETE">
			<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Удалить</button>
			{{ csrf_field() }} 
		</form>
	</td>
</tr>
@endforeach
</table>

<br>
<a class="btn btn-lime" href="{{ route('addService') }}"><i class="fas fa-plus-circle"></i> Добавить</a>
<br><br>

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