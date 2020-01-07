@extends('layouts.admin')
@section('title', 'Администативная панель')
@section('description')Администативная панель@overwrite
@section('keywords')Администативная панель@overwrite
@section('content')
<div class="panel panel-inverse">
    <div class="panel-body">

        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item active"><a href="/">Администативная панель</a></li>
        </ol>

        <h1 class="page-title">Администативная панель</h1>

        @if (session('status'))
        <div class="alert alert-success"> {{ session('status') }} </div>
        @endif

        @if (session('status-error'))
        <div class="alert alert-danger"> {{ session('status-error') }} </div>
        @endif

        <p>Добро пожаловать в Администативную панель!</p>
        <p>Вы авторизованы под логином: <b>{{Auth::user()->name}}</b></p>

    </div>
</div>
@endsection