<?php

return [
'menu' => [

[
    'icon' => 'fa fa-desktop',
    'title' => 'Лендинг',
    'url' => '/'
],[
    'icon' => 'fa fa-th-large',
    'title' => 'Администативная панель',
    'url' => '/admin'
],[
    'icon' => 'fa fa-users',
    'title' => 'Пользователи',
    'url' => 'javascript:;',
    'caret' => true,
    'sub_menu' => [[
        'url' => '/admin/user-management/users',
        'title' => 'Список пользователей'
    ],[
        'url' => '/admin/user-management/roles',
        'title' => 'Группы пользователей'
    ],[
        'url' => '/admin/user-management/permissions',
        'title' => 'Уровни доступа'
    ]]
],[
    'icon' => 'fa fa-clipboard',
    'title' => 'Контент лендинга',
    'url' => 'javascript:;',
    'caret' => true,
    'sub_menu' => [[
        'url' => '/admin/content/services',
        'title' => 'Список сервисов'
    ],[
        'url' => '/admin/content/portfolios',
        'title' => 'Список портфолио'
    ],[
        'url' => '/admin/content/news',
        'title' => 'Список новостей'
    ]]
],[
    'icon' => 'fa fa-book',
    'title' => 'Авиа справочники',
    'url' => 'javascript:;',
    'caret' => true,
    'sub_menu' => [[
        'url' => '/admin/handbook/currencies',
        'title' => 'Валюты'
    ],[
        'url' => '/admin/handbook/states',
        'title' => 'Государства'
    ],[
        'url' => '/admin/handbook/cities',
        'title' => 'Города'
    ],[
        'url' => '/admin/handbook/airfields',
        'title' => 'Авиаплощадки'
    ]]
],[
    'icon' => 'fa fa-lightbulb',
    'title' => 'Описание приложения',
    'url' => '/admin/app-desc'
]

]
]; 

