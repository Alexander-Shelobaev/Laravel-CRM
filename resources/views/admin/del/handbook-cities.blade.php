@extends('layouts.admin')

@section('title', 'Справочник городов')
@push('css')
<!-- ================== BEGIN STYLE for DataTables ================== -->
	<link href="/assets/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
<!-- ================== END STYLE for DataTables ================== -->
@endpush
@section('content')

<div class="panel panel-inverse">
	<div class="panel-body">
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="/">Главная</a></li>
			<li class="breadcrumb-item"><a href="/admin">ЛК</a></li>
			<li class="breadcrumb-item active">Справочник городов</li>
		</ol>
		
		<h1 class="page-title">Справочник городов</h1>


<table id="data-table-default" class="table table-striped table-bordered">
<thead>
	<tr>
		<th width="1%"></th>
		<th class="text-nowrap">Название города (анг.)</th>
		<th class="text-nowrap">Название города (рус.)</th>
		<th class="text-nowrap">IATA код города</th>
		<th class="text-nowrap">state_id</th>
		<th data-orderable="false"></th>
		<th data-orderable="false"></th>
	</tr>
</thead>

@foreach ($cities as $value)
<tr class='gradeA'>
	<td class='f-s-600 text-inverse'>{{ $loop->index+1 }}</td>
	<!--<td>{{ $value->id }}</td>-->
	<td>{{ $value->name_city_en }}</td>
	<td>{{ $value->name_city_ru }}</td>
	<td>{{ $value->iata_code_city }}</td>
	<td>{{ $value->state_id }}</td>
	<td><a class="btn btn-success" href="{{ route('editNews',[$value->id]) }}"><i class="fas fa-edit"></i> Редактировать</a></td>
	<td>
		<form action="{{ route('deleteNews',[$value->id]) }}" method="post" class="delete-btn" >
			<input type="hidden" name="_method" value="DELETE">
			<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Удалить</button>
			{{ csrf_field() }} 
		</form>
	</td>
</tr>
@endforeach
</table>

<br>
<a class="btn btn-lime" href="{{ route('addNews') }}"><i class="fas fa-plus-circle"></i> Добавить</a>
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
@push('scripts')
	<script src="/assets/plugins/datatables/js/jquery.dataTables1.js"></script>
	<script src="/assets/plugins/datatables/js/dataTables.bootstrap4.js"></script>
	<script src="/assets/plugins/datatables/js/responsive/dataTables.responsive.js"></script>
	<script src="/assets/plugins/datatables/js/responsive/responsive.bootstrap4.js"></script>
	<script src="/assets/js/demo/table-manage-default.demo.js"></script>
	<script>
		$(document).ready(function() {
			TableManageDefault.init();
		});
	</script>
@endpush