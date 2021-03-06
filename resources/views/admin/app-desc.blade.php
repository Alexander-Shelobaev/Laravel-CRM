@extends('layouts.admin')
@section('title', 'Описание приложения')
@section('content')
<div class="panel panel-inverse">
    <div class="panel-body">

        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="/">Администативная панель</a></li>
            <li class="breadcrumb-item active"><a href="/admin">Описание приложения</a></li>
        </ol>

        <h1 class="page-title">Описание приложения</h1>

        <h4>Логика приложения</h4>
        <p>Приложение должно состоять из 2 частей:</p>
        <ul>
            <li>Пользовательская часть (доступная для всех пользователей)</li>
            <li>Административная часть (доступная для всех для аторизированых пользователей)</li>
        </ul>

        <p><b>I. Пользовательская часть</b><br>
        Должно сосотоять из лендинга и включать в себя:</p>
        <ul>
            <li>Главную страницу - лендинг</li>
            <li>Дополнительные страницы предоставляемых услуг</li>
            <li>Дополнительные страницы портфолио</li>
            <li>Дополнительные страницы новостей</li>
            <li>В нижней часте сраницы распологается форма обратной связи</li>
        </ul>

        <p><b>II. Административная часть</b><br>
        Должно включать в себя следующий функционал:</p>
        <ul>
            <li>Авторизция, регистрация, восстановление пароля</li>
            <li>Административную часть - ЛК</li>
            <li>Страницы для добавления, редактирования, удаления предоставляемых услуг</li>
            <li>Страницы для добавления, редактирования, удаления портфолио</li>
            <li>Страницы для добавления, редактирования, удаления новостей</li>
            <li>Страницы управления пользователями</li>
            <li>Авиа справочники</li>
        </ul>

    </div>
</div>
@endsection