@extends('layouts.admin')
@section('title', 'Список пользователей')
@push('css')
<!-- ================== BEGIN STYLE for DataTables ================== -->
	<link href="/assets/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
<!-- ================== END STYLE for DataTables ================== -->
@endpush
@section('content')


<ol class="breadcrumb pull-right">
	<li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
	<li class="breadcrumb-item active"><a href="/admin">Список пользователей</a></li>
</ol>

<h1 class="page-title">Список пользователей</h1>

<table id="data-table-default" class="table table-striped table-bordered">
<thead>
	<tr>
		<th width="1%"></th>
		<th class="text-nowrap">Логин</th>
		<th class="text-nowrap">Email</th>
		<th class="text-nowrap">Роль/Роли</th>
		<th class="text-nowrap">Права/Доступы</th>
		<th data-orderable="false" colspan="2">Редактировать2</th>
		<th data-orderable="false">Удалить</th>
	</tr>
</thead>
@foreach ($users as $value)
<tr class='gradeA'>
	<td class='f-s-600 text-inverse'>{{ $loop->index+1 }}</td><!--<td>{{ $value->id }}</td>-->
	<td>{{ $value->name }}</td>
	<td>{{ $value->email }}</td>
	<td>Админ</td>
	<td>Админ</td>
	<td><a class="btn btn-success" href="{{ route('users.edit',$value) }}"><i class="fas fa-edit"></i> Редактировать</a></td>
	<td>
		<form onsubmit="if(confirm('Удалить?')){ return true } esle { return false }" action="{{ route('users.destroy',[$value->id]) }}" method="post" class="delete-btn" >
			<input type="hidden" name="_method" value="DELETE">
			<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Удалить</button>
			{{ csrf_field() }} 
		</form>
	</td>
</tr>
@endforeach
</table>


<div class="container-fluid">

	<br><p><a class="btn btn-lime" href="{{ route('users.create') }}"><i class="fas fa-plus-circle"></i> Добавить</a></p>

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



@endsection
@push('scripts')
	<script src="/assets/plugins/datatables/js/jquery.dataTables.ru.js"></script>
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