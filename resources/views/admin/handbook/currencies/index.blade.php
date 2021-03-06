@extends('layouts.admin')
@section('title', 'Справочник валют')
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
            <li class="breadcrumb-item active"><a href="/admin">Справочник валют</a></li>
        </ol>

        <h1 class="page-title">Справочник валют</h1>

        <table id="data-table-default" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="1%"></th>
                    <th class="text-nowrap">Название валюты (анг.)</th>
                    <th class="text-nowrap">Название валюты (рус.)</th>
                    <th class="text-nowrap">Буквенный код ISO 4217</th>
                    <th class="text-nowrap">Цифровой код ISO 4217</th>
                    <th class="text-nowrap">Округление</th>
                    <!--<th class="text-nowrap">признак метода округления</th>-->
                    <th class="text-nowrap">Юникод</th>
                    <!--<th data-orderable="false">ISO 3166-1</th>-->
                    <!--<th data-orderable="false">ISO 3166-1</th>-->
                    <th width="1%" data-orderable="false">Действие</th>
                </tr>
            </thead>
            @foreach ($currencies as $value)
            <tr class='gradeA'>
                <td class='f-s-600 text-inverse'>{{ $loop->index+1 }}</td><!--<td>{{ $value->id }}</td>-->
                <td>{{ $value->name_currency_en }}</td>
                <td>{{ $value->name_currency_ru }}</td>
                <td>{{ $value->iso_4217_code_currency_literal }}</td>
                <td>{{ $value->iso_4217_code_currency_numeric }}</td>
                <td>{{ $value->rounding_currency }}</td>
                <!--<td>{{-- $value->method_rounding_currency --}}</td>-->
                <td>{{ $value->unicode }}</td>
                <!--<td>{{ $value->iso_state_code }}</td>-->
                <!--<td>{{ $value->iso_state_numeric }}</td>-->
                <td class="with-btn" nowrap="">
                    <a class="btn btn-success" href="{{ route('currencies.edit',$value) }}">
                        <i class="fas fa-edit"></i> Редактировать
                    </a>
                    <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }"
                    action="{{ route('currencies.destroy',[$value->id]) }}" method="post" class="delete-btn" >
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Удалить</button>
                        {{ csrf_field() }} 
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="container-fluid">
            <p>
                <a class="btn btn-lime" href="{{ route('currencies.create') }}">
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