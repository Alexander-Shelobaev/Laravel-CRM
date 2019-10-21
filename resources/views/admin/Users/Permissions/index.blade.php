@extends('layouts.admin')
@section('title', 'Список доступов')
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
	<li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
	<li class="breadcrumb-item active"><a href="/admin">Список доступов</a></li>
</ol>

<h1 class="page-title">Список доступов</h1>

<table id="data-table-default" class="table table-striped table-bordered">
<thead>
	<tr>
		<th class="text-nowrap">Id</th><!--<th width="1%"></th>-->
		<th class="text-nowrap">Имя</th>
		<th class="text-nowrap">Код</th>
		<th width="1%" data-orderable="false">Действие</th>
	</tr>
</thead>
@foreach ($permissions as $value)
<tr class='gradeA'>
	<td>{{ $value->id }}</td><!--<td class='f-s-600 text-inverse'>{{ $loop->index+1 }}</td>-->
	<td>{{ $value->name }}</td>
	<td>{{ $value->code }}</td>
	<td class="with-btn" nowrap="">
		<a class="btn btn-success" href="{{ route('permissions.edit',$value) }}"><i class="fas fa-edit"></i> Редактировать</a>
		<form onsubmit="if(confirm('Удалить?')){ return true } else { return false }" action="{{ route('permissions.destroy',[$value->id]) }}" method="post" class="delete-btn" >
			<input type="hidden" name="_method" value="DELETE">
			<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Удалить</button>
			{{ csrf_field() }} 
		</form>
	</td>
</tr>
@endforeach
</table>


<div class="container-fluid">

	<br><p><a class="btn btn-lime" href="{{ route('permissions.create') }}"><i class="fas fa-plus-circle"></i> Добавить</a></p>

	@if (session('status'))
	<div class="alert alert-success"> {{ session('status') }} </div>
	@endif
	@if (session('status-error'))
	<div class="alert alert-danger"> {{ session('status-error') }} </div>
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