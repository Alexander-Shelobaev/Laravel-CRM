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
if (file_exists('air_reference_books/2-kgos.csv')) {

	$file = fopen('air_reference_books/2-kgos.csv', 'r');// Записываем в таблицу из данные из csv файла
	if ($file){
		echo "Файл 2-kgos.csv успешно зачитан";
		//dump($file);
	}

	$link = mysqli_connect(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE')) or die("Ошибка: " . mysqli_error($link));

	while (!feof($file)) {
		$mass = fgetcsv($file, 1024, ';');
		
		$query = "INSERT INTO states (name_state_en, name_state_ru, iso_state_code_3, iso_state_code_2) VALUES ('{$mass[0]}', '{$mass[1]}', '{$mass[2]}', '{$mass[3]}')";
		$res = mysqli_query($link, $query) or die("Ошибка: " . mysqli_error($link));
		if ($res) {
			echo "Запись строки в БЗ прошла успешно.<br>";
		}

	}    

}else{
	echo "Файл 2-kgos.csv не найден";
}





$states = DB::table('states')->select('name_state_en', 'name_state_ru', 'iso_state_code_3', 'iso_state_code_2')->get();
//echo "<pre>";print_r($states);echo "</pre>";

//json_encode
foreach ($states as $value) {
	$arr[] = $value;
	//echo "<pre>";print_r(json_encode($value, JSON_UNESCAPED_UNICODE));echo "</pre>";
	//echo json_encode($arr);
    //echo $value->name;
    //echo "<pre>";print_r($value);echo "</pre>";
}
$arr = json_encode($arr, JSON_UNESCAPED_UNICODE);
echo "<pre>";print_r($arr);echo "</pre>";
*/


$states_json = '
[{"name_state_en":"Afghanistan","name_state_ru":"Афганистан","iso_state_code_3":"AFG","iso_state_code_2":"AF"},{"name_state_en":"Albania","name_state_ru":"Албания","iso_state_code_3":"ALB","iso_state_code_2":"AL"},{"name_state_en":"Antarctica","name_state_ru":"Антарктика","iso_state_code_3":"ATA","iso_state_code_2":"AQ"},{"name_state_en":"Algeria","name_state_ru":"Алжир","iso_state_code_3":"DZA","iso_state_code_2":"DZ"},{"name_state_en":"American Samoa","name_state_ru":"Американское Самоа","iso_state_code_3":"ASM","iso_state_code_2":"AS"},{"name_state_en":"Andorra","name_state_ru":"Андорра","iso_state_code_3":"AND","iso_state_code_2":"AD"},{"name_state_en":"Angola","name_state_ru":"Ангола","iso_state_code_3":"AGO","iso_state_code_2":"AO"},{"name_state_en":"Antigua and Barbuda","name_state_ru":"Антигуа и Барбуда","iso_state_code_3":"ATG","iso_state_code_2":"AG"},{"name_state_en":"Azerbaijan","name_state_ru":"Азербайджан","iso_state_code_3":"AZE","iso_state_code_2":"AZ"},{"name_state_en":"Argentina","name_state_ru":"Аргентина","iso_state_code_3":"ARG","iso_state_code_2":"AR"},{"name_state_en":"Australia","name_state_ru":"Австралия","iso_state_code_3":"AUS","iso_state_code_2":"AU"},{"name_state_en":"Austria","name_state_ru":"Австрия","iso_state_code_3":"AUT","iso_state_code_2":"AT"},{"name_state_en":"Bahamas","name_state_ru":"Багамские Острова","iso_state_code_3":"BHS","iso_state_code_2":"BS"},{"name_state_en":"Bahrain","name_state_ru":"Бахрейн","iso_state_code_3":"BHR","iso_state_code_2":"BH"},{"name_state_en":"Bangladesh","name_state_ru":"Бангладеш","iso_state_code_3":"BGD","iso_state_code_2":"BD"},{"name_state_en":"Armenia","name_state_ru":"Армения","iso_state_code_3":"ARM","iso_state_code_2":"AM"},{"name_state_en":"Barbados","name_state_ru":"Барбадос","iso_state_code_3":"BRB","iso_state_code_2":"BB"},{"name_state_en":"Belgium","name_state_ru":"Бельгия","iso_state_code_3":"BEL","iso_state_code_2":"BE"},{"name_state_en":"Bermuda","name_state_ru":"Бермудские Острова","iso_state_code_3":"BMU","iso_state_code_2":"BM"},{"name_state_en":"Bhutan","name_state_ru":"Бутан","iso_state_code_3":"BTN","iso_state_code_2":"BT"},{"name_state_en":"Bolivia","name_state_ru":"Боливия","iso_state_code_3":"BOL","iso_state_code_2":"BO"},{"name_state_en":"Bosnia and Herzegovina","name_state_ru":"Босния и Герцеговина","iso_state_code_3":"BIH","iso_state_code_2":"BA"},{"name_state_en":"Botswana","name_state_ru":"Ботсвана","iso_state_code_3":"BWA","iso_state_code_2":"BW"},{"name_state_en":"Bouvet Island","name_state_ru":"Остров Буве","iso_state_code_3":"BVT","iso_state_code_2":"BV"},{"name_state_en":"Brazil","name_state_ru":"Бразилия","iso_state_code_3":"BRA","iso_state_code_2":"BR"},{"name_state_en":"Belize","name_state_ru":"Белиз","iso_state_code_3":"BLZ","iso_state_code_2":"BZ"},{"name_state_en":"British Indian Ocean Territory","name_state_ru":"Британская территория в Индийском океане","iso_state_code_3":"IOT","iso_state_code_2":"IO"},{"name_state_en":"Solomon Islands","name_state_ru":"Соломоновы Острова","iso_state_code_3":"SLB","iso_state_code_2":"SB"},{"name_state_en":"British Virgin Islands","name_state_ru":"Британские Виргинские острова","iso_state_code_3":"VGB","iso_state_code_2":"VG"},{"name_state_en":"Brunei Darussalam","name_state_ru":"Бруней","iso_state_code_3":"BRN","iso_state_code_2":"BN"},{"name_state_en":"Bulgaria","name_state_ru":"Болгария","iso_state_code_3":"BGR","iso_state_code_2":"BG"},{"name_state_en":"Myanmar","name_state_ru":"Мьянма","iso_state_code_3":"MMR","iso_state_code_2":"MM"},{"name_state_en":"Burundi","name_state_ru":"Бурунди","iso_state_code_3":"BDI","iso_state_code_2":"BI"},{"name_state_en":"Belarus","name_state_ru":"Белоруссия","iso_state_code_3":"BLR","iso_state_code_2":"BY"},{"name_state_en":"Cambodia","name_state_ru":"Камбоджа","iso_state_code_3":"KHM","iso_state_code_2":"KH"},{"name_state_en":"Cameroon","name_state_ru":"Камерун","iso_state_code_3":"CMR","iso_state_code_2":"CM"},{"name_state_en":"Canada","name_state_ru":"Канада","iso_state_code_3":"CAN","iso_state_code_2":"CA"},{"name_state_en":"Cabo Verde","name_state_ru":"Кабо-Верде","iso_state_code_3":"CPV","iso_state_code_2":"CV"},{"name_state_en":"Cayman Islands","name_state_ru":"Каймановы острова","iso_state_code_3":"CYM","iso_state_code_2":"KY"},{"name_state_en":"Central African Republic","name_state_ru":"Центральноафриканская Республика","iso_state_code_3":"CAF","iso_state_code_2":"CF"},{"name_state_en":"Sri Lanka","name_state_ru":"Шри-Ланка","iso_state_code_3":"LKA","iso_state_code_2":"LK"},{"name_state_en":"Chad","name_state_ru":"Чад","iso_state_code_3":"TCD","iso_state_code_2":"TD"},{"name_state_en":"Chile","name_state_ru":"Чили","iso_state_code_3":"CHL","iso_state_code_2":"CL"},{"name_state_en":"China","name_state_ru":"Китайская Народная Республика","iso_state_code_3":"CHN","iso_state_code_2":"CN"},{"name_state_en":"Taiwan","name_state_ru":"Тайвань","iso_state_code_3":"TWN","iso_state_code_2":"TW"},{"name_state_en":"Christmas Island","name_state_ru":"Остров Рождества","iso_state_code_3":"CXR","iso_state_code_2":"CX"},{"name_state_en":"Cocos Islands","name_state_ru":"Кокосовые острова","iso_state_code_3":"CCK","iso_state_code_2":"CC"},{"name_state_en":"Colombia","name_state_ru":"Колумбия","iso_state_code_3":"COL","iso_state_code_2":"CO"},{"name_state_en":"Comoros","name_state_ru":"Коморы","iso_state_code_3":"COM","iso_state_code_2":"KM"},{"name_state_en":"Mayotte","name_state_ru":"Майотта","iso_state_code_3":"MYT","iso_state_code_2":"YT"},{"name_state_en":"Congo","name_state_ru":"Республика Конго","iso_state_code_3":"COG","iso_state_code_2":"CG"},{"name_state_en":"The Democratic Republic of the Congo","name_state_ru":"Демократическая Республика Конго","iso_state_code_3":"COD","iso_state_code_2":"CD"},{"name_state_en":"Cook Islands","name_state_ru":"Острова Кука","iso_state_code_3":"COK","iso_state_code_2":"CK"},{"name_state_en":"Costa Rica","name_state_ru":"Коста-Рика","iso_state_code_3":"CRI","iso_state_code_2":"CR"},{"name_state_en":"Croatia","name_state_ru":"Хорватия","iso_state_code_3":"HRV","iso_state_code_2":"HR"},{"name_state_en":"Cuba","name_state_ru":"Куба","iso_state_code_3":"CUB","iso_state_code_2":"CU"},{"name_state_en":"Cyprus","name_state_ru":"Кипр","iso_state_code_3":"CYP","iso_state_code_2":"CY"},{"name_state_en":"Czechia","name_state_ru":"Чехия","iso_state_code_3":"CZE","iso_state_code_2":"CZ"},{"name_state_en":"Benin","name_state_ru":"Бенин","iso_state_code_3":"BEN","iso_state_code_2":"BJ"},{"name_state_en":"Denmark","name_state_ru":"Дания","iso_state_code_3":"DNK","iso_state_code_2":"DK"},{"name_state_en":"Dominica","name_state_ru":"Доминика","iso_state_code_3":"DMA","iso_state_code_2":"DM"},{"name_state_en":"Dominican Republic","name_state_ru":"Доминиканская Республика","iso_state_code_3":"DOM","iso_state_code_2":"DO"},{"name_state_en":"Ecuador","name_state_ru":"Эквадор","iso_state_code_3":"ECU","iso_state_code_2":"EC"},{"name_state_en":"El Salvador","name_state_ru":"Сальвадор","iso_state_code_3":"SLV","iso_state_code_2":"SV"},{"name_state_en":"Equatorial Guinea","name_state_ru":"Экваториальная Гвинея","iso_state_code_3":"GNQ","iso_state_code_2":"GQ"},{"name_state_en":"Ethiopia","name_state_ru":"Эфиопия","iso_state_code_3":"ETH","iso_state_code_2":"ET"},{"name_state_en":"Eritrea","name_state_ru":"Эритрея","iso_state_code_3":"ERI","iso_state_code_2":"ER"},{"name_state_en":"Estonia","name_state_ru":"Эстония","iso_state_code_3":"EST","iso_state_code_2":"EE"},{"name_state_en":"Faroe Islands","name_state_ru":"Фарерские острова","iso_state_code_3":"FRO","iso_state_code_2":"FO"},{"name_state_en":"Falkland Islands","name_state_ru":"Фолклендские острова","iso_state_code_3":"FLK","iso_state_code_2":"FK"},{"name_state_en":"South Georgia and the South Sandwich Islands","name_state_ru":"Южная Георгия и Южные Сандвичевы острова","iso_state_code_3":"SGS","iso_state_code_2":"GS"},{"name_state_en":"Fiji","name_state_ru":"Фиджи","iso_state_code_3":"FJI","iso_state_code_2":"FJ"},{"name_state_en":"Finland","name_state_ru":"Финляндия","iso_state_code_3":"FIN","iso_state_code_2":"FI"},{"name_state_en":"Åland Islands","name_state_ru":"Аландские острова","iso_state_code_3":"ALA","iso_state_code_2":"AX"},{"name_state_en":"France","name_state_ru":"Франция","iso_state_code_3":"FRA","iso_state_code_2":"FR"},{"name_state_en":"French Guiana","name_state_ru":"Французская Гвиана","iso_state_code_3":"GUF","iso_state_code_2":"GF"},{"name_state_en":"French Polynesia","name_state_ru":"Французская Полинезия","iso_state_code_3":"PYF","iso_state_code_2":"PF"},{"name_state_en":"French Southern Territories","name_state_ru":"Французские Южные и Антарктические территории","iso_state_code_3":"ATF","iso_state_code_2":"TF"},{"name_state_en":"Djibouti","name_state_ru":"Джибути","iso_state_code_3":"DJI","iso_state_code_2":"DJ"},{"name_state_en":"Gabon","name_state_ru":"Габон","iso_state_code_3":"GAB","iso_state_code_2":"GA"},{"name_state_en":"Georgia","name_state_ru":"Грузия","iso_state_code_3":"GEO","iso_state_code_2":"GE"},{"name_state_en":"Gambia","name_state_ru":"Гамбия","iso_state_code_3":"GMB","iso_state_code_2":"GM"},{"name_state_en":"Palestine","name_state_ru":"Палестина","iso_state_code_3":"PSE","iso_state_code_2":"PS"},{"name_state_en":"Germany","name_state_ru":"Германия","iso_state_code_3":"DEU","iso_state_code_2":"DE"},{"name_state_en":"Ghana","name_state_ru":"Гана","iso_state_code_3":"GHA","iso_state_code_2":"GH"},{"name_state_en":"Gibraltar","name_state_ru":"Гибралтар","iso_state_code_3":"GIB","iso_state_code_2":"GI"},{"name_state_en":"Kiribati","name_state_ru":"Кирибати","iso_state_code_3":"KIR","iso_state_code_2":"KI"},{"name_state_en":"Greece","name_state_ru":"Греция","iso_state_code_3":"GRC","iso_state_code_2":"GR"},{"name_state_en":"Greenland","name_state_ru":"Гренландия","iso_state_code_3":"GRL","iso_state_code_2":"GL"},{"name_state_en":"Grenada","name_state_ru":"Гренада","iso_state_code_3":"GRD","iso_state_code_2":"GD"},{"name_state_en":"Guadeloupe","name_state_ru":"Гваделупа","iso_state_code_3":"GLP","iso_state_code_2":"GP"},{"name_state_en":"Guam","name_state_ru":"Гуам","iso_state_code_3":"GUM","iso_state_code_2":"GU"},{"name_state_en":"Guatemala","name_state_ru":"Гватемала","iso_state_code_3":"GTM","iso_state_code_2":"GT"},{"name_state_en":"Guinea","name_state_ru":"Гвинея","iso_state_code_3":"GIN","iso_state_code_2":"GN"},{"name_state_en":"Guyana","name_state_ru":"Гайана","iso_state_code_3":"GUY","iso_state_code_2":"GY"},{"name_state_en":"Haiti","name_state_ru":"Республика Гаити","iso_state_code_3":"HTI","iso_state_code_2":"HT"},{"name_state_en":"Heard Island and McDonald Islands","name_state_ru":"Остров Херд и острова Макдональд","iso_state_code_3":"HMD","iso_state_code_2":"HM"},{"name_state_en":"Holy See","name_state_ru":"Ватикан","iso_state_code_3":"VAT","iso_state_code_2":"VA"},{"name_state_en":"Honduras","name_state_ru":"Гондурас","iso_state_code_3":"HND","iso_state_code_2":"HN"},{"name_state_en":"Hong Kong","name_state_ru":"Гонконг","iso_state_code_3":"HKG","iso_state_code_2":"HK"},{"name_state_en":"Hungary","name_state_ru":"Венгрия","iso_state_code_3":"HUN","iso_state_code_2":"HU"},{"name_state_en":"Iceland","name_state_ru":"Исландия","iso_state_code_3":"ISL","iso_state_code_2":"IS"},{"name_state_en":"India","name_state_ru":"Индия","iso_state_code_3":"IND","iso_state_code_2":"IN"},{"name_state_en":"Indonesia","name_state_ru":"Индонезия","iso_state_code_3":"IDN","iso_state_code_2":"ID"},{"name_state_en":"Iran","name_state_ru":"Иран","iso_state_code_3":"IRN","iso_state_code_2":"IR"},{"name_state_en":"Iraq","name_state_ru":"Ирак","iso_state_code_3":"IRQ","iso_state_code_2":"IQ"},{"name_state_en":"Ireland","name_state_ru":"Ирландия","iso_state_code_3":"IRL","iso_state_code_2":"IE"},{"name_state_en":"Israel","name_state_ru":"Израиль","iso_state_code_3":"ISR","iso_state_code_2":"IL"},{"name_state_en":"Italy","name_state_ru":"Италия","iso_state_code_3":"ITA","iso_state_code_2":"IT"},{"name_state_en":"Ivory Coast","name_state_ru":"Кот-д’Ивуар","iso_state_code_3":"CIV","iso_state_code_2":"CI"},{"name_state_en":"Jamaica","name_state_ru":"Ямайка","iso_state_code_3":"JAM","iso_state_code_2":"JM"},{"name_state_en":"Japan","name_state_ru":"Япония","iso_state_code_3":"JPN","iso_state_code_2":"JP"},{"name_state_en":"Kazakhstan","name_state_ru":"Казахстан","iso_state_code_3":"KAZ","iso_state_code_2":"KZ"},{"name_state_en":"Jordan","name_state_ru":"Иордания","iso_state_code_3":"JOR","iso_state_code_2":"JO"},{"name_state_en":"Kenya","name_state_ru":"Кения","iso_state_code_3":"KEN","iso_state_code_2":"KE"},{"name_state_en":"DPRK","name_state_ru":"КНДР","iso_state_code_3":"PRK","iso_state_code_2":"KP"},{"name_state_en":"Republic of Korea","name_state_ru":"Республика Корея","iso_state_code_3":"KOR","iso_state_code_2":"KR"},{"name_state_en":"Kuwait","name_state_ru":"Кувейт","iso_state_code_3":"KWT","iso_state_code_2":"KW"},{"name_state_en":"Kyrgyzstan","name_state_ru":"Киргизия","iso_state_code_3":"KGZ","iso_state_code_2":"KG"},{"name_state_en":"Lao","name_state_ru":"Лаос","iso_state_code_3":"LAO","iso_state_code_2":"LA"},{"name_state_en":"Lebanon","name_state_ru":"Ливан","iso_state_code_3":"LBN","iso_state_code_2":"LB"},{"name_state_en":"Lesotho","name_state_ru":"Лесото","iso_state_code_3":"LSO","iso_state_code_2":"LS"},{"name_state_en":"Latvia","name_state_ru":"Латвия","iso_state_code_3":"LVA","iso_state_code_2":"LV"},{"name_state_en":"Liberia","name_state_ru":"Либерия","iso_state_code_3":"LBR","iso_state_code_2":"LR"},{"name_state_en":"Libya","name_state_ru":"Ливия","iso_state_code_3":"LBY","iso_state_code_2":"LY"},{"name_state_en":"Liechtenstein","name_state_ru":"Лихтенштейн","iso_state_code_3":"LIE","iso_state_code_2":"LI"},{"name_state_en":"Lithuania","name_state_ru":"Литва","iso_state_code_3":"LTU","iso_state_code_2":"LT"},{"name_state_en":"Luxembourg","name_state_ru":"Люксембург","iso_state_code_3":"LUX","iso_state_code_2":"LU"},{"name_state_en":"Macao","name_state_ru":"Макао","iso_state_code_3":"MAC","iso_state_code_2":"MO"},{"name_state_en":"Madagascar","name_state_ru":"Мадагаскар","iso_state_code_3":"MDG","iso_state_code_2":"MG"},{"name_state_en":"Malawi","name_state_ru":"Малави","iso_state_code_3":"MWI","iso_state_code_2":"MW"},{"name_state_en":"Malaysia","name_state_ru":"Малайзия","iso_state_code_3":"MYS","iso_state_code_2":"MY"},{"name_state_en":"Maldives","name_state_ru":"Мальдивы","iso_state_code_3":"MDV","iso_state_code_2":"MV"},{"name_state_en":"Mali","name_state_ru":"Мали","iso_state_code_3":"MLI","iso_state_code_2":"ML"},{"name_state_en":"Malta","name_state_ru":"Мальта","iso_state_code_3":"MLT","iso_state_code_2":"MT"},{"name_state_en":"Martinique","name_state_ru":"Мартиника","iso_state_code_3":"MTQ","iso_state_code_2":"MQ"},{"name_state_en":"Mauritania","name_state_ru":"Мавритания","iso_state_code_3":"MRT","iso_state_code_2":"MR"},{"name_state_en":"Mauritius","name_state_ru":"Маврикий","iso_state_code_3":"MUS","iso_state_code_2":"MU"},{"name_state_en":"Mexico","name_state_ru":"Мексика","iso_state_code_3":"MEX","iso_state_code_2":"MX"},{"name_state_en":"Monaco","name_state_ru":"Монако","iso_state_code_3":"MCO","iso_state_code_2":"MC"},{"name_state_en":"Mongolia","name_state_ru":"Монголия","iso_state_code_3":"MNG","iso_state_code_2":"MN"},{"name_state_en":"Moldova","name_state_ru":"Молдавия","iso_state_code_3":"MDA","iso_state_code_2":"MD"},{"name_state_en":"Montenegro","name_state_ru":"Черногория","iso_state_code_3":"MNE","iso_state_code_2":"ME"},{"name_state_en":"Montserrat","name_state_ru":"Монтсеррат","iso_state_code_3":"MSR","iso_state_code_2":"MS"},{"name_state_en":"Morocco","name_state_ru":"Марокко","iso_state_code_3":"MAR","iso_state_code_2":"MA"},{"name_state_en":"Mozambique","name_state_ru":"Мозамбик","iso_state_code_3":"MOZ","iso_state_code_2":"MZ"},{"name_state_en":"Oman","name_state_ru":"Оман","iso_state_code_3":"OMN","iso_state_code_2":"OM"},{"name_state_en":"Namibia","name_state_ru":"Намибия","iso_state_code_3":"NAM","iso_state_code_2":"NA"},{"name_state_en":"Nauru","name_state_ru":"Науру","iso_state_code_3":"NRU","iso_state_code_2":"NR"},{"name_state_en":"Nepal","name_state_ru":"Непал","iso_state_code_3":"NPL","iso_state_code_2":"NP"},{"name_state_en":"Netherlands","name_state_ru":"Нидерланды","iso_state_code_3":"NLD","iso_state_code_2":"NL"},{"name_state_en":"Curaçao","name_state_ru":"Кюрасао","iso_state_code_3":"CUW","iso_state_code_2":"CW"},{"name_state_en":"Aruba","name_state_ru":"Аруба","iso_state_code_3":"ABW","iso_state_code_2":"AW"},{"name_state_en":"Sint Maarten","name_state_ru":"Синт-Мартен","iso_state_code_3":"SXM","iso_state_code_2":"SX"},{"name_state_en":"Bonaire, Sint Eustatius and Saba","name_state_ru":"Бонэйр, Синт-Эстатиус и Саба","iso_state_code_3":"BES","iso_state_code_2":"BQ"},{"name_state_en":"New Caledonia","name_state_ru":"Новая Каледония","iso_state_code_3":"NCL","iso_state_code_2":"NC"},{"name_state_en":"Vanuatu","name_state_ru":"Вануату","iso_state_code_3":"VUT","iso_state_code_2":"VU"},{"name_state_en":"New Zealand","name_state_ru":"Новая Зеландия","iso_state_code_3":"NZL","iso_state_code_2":"NZ"},{"name_state_en":"Nicaragua","name_state_ru":"Никарагуа","iso_state_code_3":"NIC","iso_state_code_2":"NI"},{"name_state_en":"Niger","name_state_ru":"Нигер","iso_state_code_3":"NER","iso_state_code_2":"NE"},{"name_state_en":"Nigeria","name_state_ru":"Нигерия","iso_state_code_3":"NGA","iso_state_code_2":"NG"},{"name_state_en":"Niue","name_state_ru":"Ниуэ","iso_state_code_3":"NIU","iso_state_code_2":"NU"},{"name_state_en":"Norfolk Island","name_state_ru":"Норфолк","iso_state_code_3":"NFK","iso_state_code_2":"NF"},{"name_state_en":"Norway","name_state_ru":"Норвегия","iso_state_code_3":"NOR","iso_state_code_2":"NO"},{"name_state_en":"Northern Mariana Islands","name_state_ru":"Северные Марианские острова","iso_state_code_3":"MNP","iso_state_code_2":"MP"},{"name_state_en":"United States Minor Outlying Islands","name_state_ru":"Внешние малые острова США","iso_state_code_3":"UMI","iso_state_code_2":"UM"},{"name_state_en":"Micronesia","name_state_ru":"Микронезия","iso_state_code_3":"FSM","iso_state_code_2":"FM"},{"name_state_en":"Marshall Islands","name_state_ru":"Маршалловы Острова","iso_state_code_3":"MHL","iso_state_code_2":"MH"},{"name_state_en":"Palau","name_state_ru":"Палау","iso_state_code_3":"PLW","iso_state_code_2":"PW"},{"name_state_en":"Pakistan","name_state_ru":"Пакистан","iso_state_code_3":"PAK","iso_state_code_2":"PK"},{"name_state_en":"Panama","name_state_ru":"Панама","iso_state_code_3":"PAN","iso_state_code_2":"PA"},{"name_state_en":"Papua New Guinea","name_state_ru":"Папуа — Новая Гвинея","iso_state_code_3":"PNG","iso_state_code_2":"PG"},{"name_state_en":"Paraguay","name_state_ru":"Парагвай","iso_state_code_3":"PRY","iso_state_code_2":"PY"},{"name_state_en":"Peru","name_state_ru":"Перу","iso_state_code_3":"PER","iso_state_code_2":"PE"},{"name_state_en":"Philippines","name_state_ru":"Филиппины","iso_state_code_3":"PHL","iso_state_code_2":"PH"},{"name_state_en":"Pitcairn","name_state_ru":"Острова Питкэрн","iso_state_code_3":"PCN","iso_state_code_2":"PN"},{"name_state_en":"Poland","name_state_ru":"Польша","iso_state_code_3":"POL","iso_state_code_2":"PL"},{"name_state_en":"Portugal","name_state_ru":"Португалия","iso_state_code_3":"PRT","iso_state_code_2":"PT"},{"name_state_en":"Guinea-Bissau","name_state_ru":"Гвинея-Бисау","iso_state_code_3":"GNB","iso_state_code_2":"GW"},{"name_state_en":"Timor-Leste","name_state_ru":"Восточный Тимор","iso_state_code_3":"TLS","iso_state_code_2":"TL"},{"name_state_en":"Puerto Rico","name_state_ru":"Пуэрто-Рико","iso_state_code_3":"PRI","iso_state_code_2":"PR"},{"name_state_en":"Qatar","name_state_ru":"Катар","iso_state_code_3":"QAT","iso_state_code_2":"QA"},{"name_state_en":"Réunion","name_state_ru":"Реюньон","iso_state_code_3":"REU","iso_state_code_2":"RE"},{"name_state_en":"Romania","name_state_ru":"Румыния","iso_state_code_3":"ROU","iso_state_code_2":"RO"},{"name_state_en":"Russian Federation","name_state_ru":"Россия","iso_state_code_3":"RUS","iso_state_code_2":"RU"},{"name_state_en":"Rwanda","name_state_ru":"Руанда","iso_state_code_3":"RWA","iso_state_code_2":"RW"},{"name_state_en":"Saint Barthélemy","name_state_ru":"Сен-Бартелеми","iso_state_code_3":"BLM","iso_state_code_2":"BL"},{"name_state_en":"Saint Helena, Ascension and Tristan da Cunha","name_state_ru":"Острова Святой Елены, Вознесения и Тристан-да-Кунья","iso_state_code_3":"SHN","iso_state_code_2":"SH"},{"name_state_en":"Saint Kitts and Nevis","name_state_ru":"Сент-Китс и Невис","iso_state_code_3":"KNA","iso_state_code_2":"KN"},{"name_state_en":"Anguilla","name_state_ru":"Ангилья","iso_state_code_3":"AIA","iso_state_code_2":"AI"},{"name_state_en":"Saint Lucia","name_state_ru":"Сент-Люсия","iso_state_code_3":"LCA","iso_state_code_2":"LC"},{"name_state_en":"Saint Martin","name_state_ru":"Сен-Мартен","iso_state_code_3":"MAF","iso_state_code_2":"MF"},{"name_state_en":"Saint Pierre and Miquelon","name_state_ru":"Сен-Пьер и Микелон","iso_state_code_3":"SPM","iso_state_code_2":"PM"},{"name_state_en":"Saint Vincent and the Grenadines","name_state_ru":"Сент-Винсент и Гренадины","iso_state_code_3":"VCT","iso_state_code_2":"VC"},{"name_state_en":"San Marino","name_state_ru":"Сан-Марино","iso_state_code_3":"SMR","iso_state_code_2":"SM"},{"name_state_en":"Sao Tome and Principe","name_state_ru":"Сан-Томе и Принсипи","iso_state_code_3":"STP","iso_state_code_2":"ST"},{"name_state_en":"Saudi Arabia","name_state_ru":"Саудовская Аравия","iso_state_code_3":"SAU","iso_state_code_2":"SA"},{"name_state_en":"Senegal","name_state_ru":"Сенегал","iso_state_code_3":"SEN","iso_state_code_2":"SN"},{"name_state_en":"Serbia","name_state_ru":"Сербия","iso_state_code_3":"SRB","iso_state_code_2":"RS"},{"name_state_en":"Seychelles","name_state_ru":"Сейшельские Острова","iso_state_code_3":"SYC","iso_state_code_2":"SC"},{"name_state_en":"Sierra Leone","name_state_ru":"Сьерра-Леоне","iso_state_code_3":"SLE","iso_state_code_2":"SL"},{"name_state_en":"Singapore","name_state_ru":"Сингапур","iso_state_code_3":"SGP","iso_state_code_2":"SG"},{"name_state_en":"Slovakia","name_state_ru":"Словакия","iso_state_code_3":"SVK","iso_state_code_2":"SK"},{"name_state_en":"Viet Nam","name_state_ru":"Вьетнам","iso_state_code_3":"VNM","iso_state_code_2":"VN"},{"name_state_en":"Slovenia","name_state_ru":"Словения","iso_state_code_3":"SVN","iso_state_code_2":"SI"},{"name_state_en":"Somalia","name_state_ru":"Сомали","iso_state_code_3":"SOM","iso_state_code_2":"SO"},{"name_state_en":"South Africa","name_state_ru":"Южно-Африканская Республика","iso_state_code_3":"ZAF","iso_state_code_2":"ZA"},{"name_state_en":"Zimbabwe","name_state_ru":"Зимбабве","iso_state_code_3":"ZWE","iso_state_code_2":"ZW"},{"name_state_en":"Spain","name_state_ru":"Испания","iso_state_code_3":"ESP","iso_state_code_2":"ES"},{"name_state_en":"South Sudan","name_state_ru":"Южный Судан","iso_state_code_3":"SSD","iso_state_code_2":"SS"},{"name_state_en":"Sudan","name_state_ru":"Судан","iso_state_code_3":"SDN","iso_state_code_2":"SD"},{"name_state_en":"Western Sahara","name_state_ru":"Западная Сахара","iso_state_code_3":"ESH","iso_state_code_2":"EH"},{"name_state_en":"Suriname","name_state_ru":"Суринам","iso_state_code_3":"SUR","iso_state_code_2":"SR"},{"name_state_en":"Svalbard and Jan Mayen","name_state_ru":"Шпицберген и Ян-Майен","iso_state_code_3":"SJM","iso_state_code_2":"SJ"},{"name_state_en":"Swaziland","name_state_ru":"Свазиленд","iso_state_code_3":"SWZ","iso_state_code_2":"SZ"},{"name_state_en":"Sweden","name_state_ru":"Швеция","iso_state_code_3":"SWE","iso_state_code_2":"SE"},{"name_state_en":"Switzerland","name_state_ru":"Швейцария","iso_state_code_3":"CHE","iso_state_code_2":"CH"},{"name_state_en":"Syrian Arab Republic","name_state_ru":"Сирия","iso_state_code_3":"SYR","iso_state_code_2":"SY"},{"name_state_en":"Tajikistan","name_state_ru":"Таджикистан","iso_state_code_3":"TJK","iso_state_code_2":"TJ"},{"name_state_en":"Thailand","name_state_ru":"Таиланд","iso_state_code_3":"THA","iso_state_code_2":"TH"},{"name_state_en":"Togo","name_state_ru":"Того","iso_state_code_3":"TGO","iso_state_code_2":"TG"},{"name_state_en":"Tokelau","name_state_ru":"Токелау","iso_state_code_3":"TKL","iso_state_code_2":"TK"},{"name_state_en":"Tonga","name_state_ru":"Тонга","iso_state_code_3":"TON","iso_state_code_2":"TO"},{"name_state_en":"Trinidad and Tobago","name_state_ru":"Тринидад и Тобаго","iso_state_code_3":"TTO","iso_state_code_2":"TT"},{"name_state_en":"United Arab Emirates","name_state_ru":"Объединённые Арабские Эмираты","iso_state_code_3":"ARE","iso_state_code_2":"AE"},{"name_state_en":"Tunisia","name_state_ru":"Тунис","iso_state_code_3":"TUN","iso_state_code_2":"TN"},{"name_state_en":"Turkey","name_state_ru":"Турция","iso_state_code_3":"TUR","iso_state_code_2":"TR"},{"name_state_en":"Turkmenistan","name_state_ru":"Туркмения","iso_state_code_3":"TKM","iso_state_code_2":"TM"},{"name_state_en":"Turks and Caicos Islands","name_state_ru":"Теркс и Кайкос","iso_state_code_3":"TCA","iso_state_code_2":"TC"},{"name_state_en":"Tuvalu","name_state_ru":"Тувалу","iso_state_code_3":"TUV","iso_state_code_2":"TV"},{"name_state_en":"Uganda","name_state_ru":"Уганда","iso_state_code_3":"UGA","iso_state_code_2":"UG"},{"name_state_en":"Ukraine","name_state_ru":"Украина","iso_state_code_3":"UKR","iso_state_code_2":"UA"},{"name_state_en":"Macedonia","name_state_ru":"Республика Македония","iso_state_code_3":"MKD","iso_state_code_2":"MK"},{"name_state_en":"Egypt","name_state_ru":"Египет","iso_state_code_3":"EGY","iso_state_code_2":"EG"},{"name_state_en":"United Kingdom","name_state_ru":"Великобритания","iso_state_code_3":"GBR","iso_state_code_2":"GB"},{"name_state_en":"Guernsey","name_state_ru":"Гернси","iso_state_code_3":"GGY","iso_state_code_2":"GG"},{"name_state_en":"Jersey","name_state_ru":"Джерси","iso_state_code_3":"JEY","iso_state_code_2":"JE"},{"name_state_en":"Isle of Man","name_state_ru":"Остров Мэн","iso_state_code_3":"IMN","iso_state_code_2":"IM"},{"name_state_en":"Tanzania, United Republic of","name_state_ru":"Танзания","iso_state_code_3":"TZA","iso_state_code_2":"TZ"},{"name_state_en":"United States of America","name_state_ru":"Соединённые Штаты Америки","iso_state_code_3":"USA","iso_state_code_2":"US"},{"name_state_en":"U.S. Virgin Islands","name_state_ru":"Виргинские Острова США","iso_state_code_3":"VIR","iso_state_code_2":"VI"},{"name_state_en":"Burkina Faso","name_state_ru":"Буркина-Фасо","iso_state_code_3":"BFA","iso_state_code_2":"BF"},{"name_state_en":"Uruguay","name_state_ru":"Уругвай","iso_state_code_3":"URY","iso_state_code_2":"UY"},{"name_state_en":"Uzbekistan","name_state_ru":"Узбекистан","iso_state_code_3":"UZB","iso_state_code_2":"UZ"},{"name_state_en":"Venezuela","name_state_ru":"Венесуэла","iso_state_code_3":"VEN","iso_state_code_2":"VE"},{"name_state_en":"Wallis and Futuna","name_state_ru":"Уоллис и Футуна","iso_state_code_3":"WLF","iso_state_code_2":"WF"},{"name_state_en":"Samoa","name_state_ru":"Самоа","iso_state_code_3":"WSM","iso_state_code_2":"WS"},{"name_state_en":"Yemen","name_state_ru":"Йемен","iso_state_code_3":"YEM","iso_state_code_2":"YE"},{"name_state_en":"Zambia","name_state_ru":"Замбия","iso_state_code_3":"ZMB","iso_state_code_2":"ZM"}]
';


$states_arr = json_decode($states_json, true);

foreach ($states_arr as $value) {
    States::create([
        'name_state_en'=>$value['name_state_en'],
        'name_state_ru'=>$value['name_state_ru'],
        'iso_state_code_3'=>$value['iso_state_code_3'],
        'iso_state_code_2'=>$value['iso_state_code_2'],
    ]);
}














/*

	Currencies::create([
		'name_currency_en'=>$value['name_currency_en'],
		'name_currency_ru'=>$value['name_currency_ru'],
		'code_literal_iso_4217'=>$value['code_literal_iso_4217'],
		'code_numeric_iso_4217'=>$value['code_numeric_iso_4217'],
		'rounding_currency'=>$value['rounding_currency'],
		'rounding_method'=>$value['rounding_method'],
		'unicode'=>$value['unicode'],
		'iso_state_code'=>$value['iso_state_code'],
		'iso_state_numeric'=>$value['iso_state_numeric']
	]);

*/


/*
// вариант с использование PDO
DB::table('states')->insert(
	[
		'name_state_en' => '{$mass[0]}',
		'name_state_ru' => '{$mass[1]}',
		'iso_state_code_3' => '{$mass[2]}',
		'iso_state_code_2' => '{$mass[3]}',
	]
);

// вариант с использование моделей
Currencies::create(['title'=>"Разработка",'alias'=>'development','short_text'=>"",]);
*/

//$result2 = mysqli_query($link, "SELECT * FROM states") or die("Ошибка: " . mysqli_error($link)); // Ищим все в БД
//$result2 = pg_query($pg_conn, "SELECT * FROM kgos"); // Ищим все в БД
//$arr2 = pg_fetch_all($result2); // Преобразем найденное в массив



/**/
?>

	</div>
</div>
@endsection

