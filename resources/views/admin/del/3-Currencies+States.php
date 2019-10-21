@extends('layouts.admin')

@section('title', 'Пользователи')

@section('content')

<div class="panel panel-inverse">
	<div class="panel-body">
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="/">Главная</a></li>
			<li class="breadcrumb-item"><a href="/admin">ЛК</a></li>
			<li class="breadcrumb-item active">Пользователи</li>
		</ol>

<h1 class="page-title">Пользователи</h1>
@if (session('status'))
<div class="alert alert-success" role="alert">
	{{ session('status') }}
</div>
@endif

<p>Вы авторизованы под именем: <b>{{Auth::user()->name}}</b></p>

<p>Список пользователей</p>


<pre>
php artisan make:migration create_currencies_table &&
php artisan make:migration create_states_table &&
php artisan make:migration create_cities_table &&
php artisan make:migration create_airplaces_table &&
php artisan make:model Currencies &&
php artisan make:model States &&
php artisan make:model Cities &&
php artisan make:model Airplaces &&
php artisan make:seeder seedCurrencies &&
php artisan make:seeder seedStates &&
php artisan make:seeder seedCities &&
php artisan make:seeder seedAirplaces

w: && cd domains\Software-Provider.local 
</pre>

<?



/*
$currencies = DB::table('currencies')->get();
$states = DB::table('states')->get();

// Выявляем совпадения iso state code у таблицы валюты и таблицы государства
foreach ($currencies as $value1) {
	foreach ($states as $value2) {
		if ($value1->iso_state_code == $value2->iso_state_code_3) {
			echo $value2->name_state_ru.$value2->id.' = '.$value1->name_currency_ru.$value1->id.'<br>';
			DB::table('states')->where('id', $value2->id)->update(['state_currency_code' => $value1->id]); // Записывем в базу данных
		}
	}
}









foreach ($currencies as $key1 => $value1) {
    echo "<pre>";print_r($value1->iso_state_code);echo "</pre>";
}


foreach ($states_arr as $value) {
    States::create([
        'name_state_en'=>$value['name_state_en'],
        'name_state_ru'=>$value['name_state_ru'],
        'iso_state_code_3'=>$value['iso_state_code_3'],
        'iso_state_code_2'=>$value['iso_state_code_2'],
    ]);
}










*/
?>

	</div>
</div>
@endsection

