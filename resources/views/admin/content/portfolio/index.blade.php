@extends('layouts.admin')
@section('title', 'Список портфолио')
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
            <li class="breadcrumb-item active"><a href="/admin">Список портфолио</a></li>
        </ol>

        <h1 class="page-title">Список портфолио</h1>

        <table id="data-table-default" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="1%"></th>
                <th class="text-nowrap">Заголовок</th>
                <th class="text-nowrap">Описание</th>
                <th class="text-nowrap">Ссылка на проект</th>
                <th data-orderable="false">Изображение</th>
                <th width="1%" data-orderable="false">Действие</th>
            </tr>
        </thead>
        @foreach ($portfolios as $value)
        <tr class='gradeA'>
            <td class='f-s-600 text-inverse'>{{ $loop->index+1 }}</td><!--<td>{{ $value->id }}</td>-->
            <td>{{ $value->title }}</td>
            <td>{{ $value->short_text }}</td>
            <td>{{ $value->href }}</td>
            <td class="with-img picture-announce">
                <img src="{{ asset('/assets-landing/img/'.$value->img) }}" class="img-rounded picture-announce">
            </td>
            <td class="with-btn" nowrap="">
                <a class="btn btn-success" href="{{ route('portfolios.edit',$value) }}">
                    <i class="fas fa-edit"></i> Редактировать
                </a>
                <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }" 
                action="{{ route('portfolios.destroy',[$value->id]) }}" method="post" class="delete-btn" >
                    {{ method_field('delete') }} 
                    {{ csrf_field() }} 
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>


        <div class="container-fluid">
            <p>
                <a class="btn btn-lime" href="{{ route('portfolios.create') }}">
                    <i class="fas fa-plus-circle"></i> Добавить
                </a>
            </p>

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
