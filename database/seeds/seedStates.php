<?php

use Illuminate\Database\Seeder;
use App\State;


class seedStates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


$states_json = '
[{"name_state_en":"Afghanistan","name_state_ru":"Афганистан","iso_code_3_state":"AFG","iso_code_2_state":"AF"},{"name_state_en":"Albania","name_state_ru":"Албания","iso_code_3_state":"ALB","iso_code_2_state":"AL"},{"name_state_en":"Antarctica","name_state_ru":"Антарктика","iso_code_3_state":"ATA","iso_code_2_state":"AQ"},{"name_state_en":"Algeria","name_state_ru":"Алжир","iso_code_3_state":"DZA","iso_code_2_state":"DZ"},{"name_state_en":"American Samoa","name_state_ru":"Американское Самоа","iso_code_3_state":"ASM","iso_code_2_state":"AS"},{"name_state_en":"Andorra","name_state_ru":"Андорра","iso_code_3_state":"AND","iso_code_2_state":"AD"},{"name_state_en":"Angola","name_state_ru":"Ангола","iso_code_3_state":"AGO","iso_code_2_state":"AO"},{"name_state_en":"Antigua and Barbuda","name_state_ru":"Антигуа и Барбуда","iso_code_3_state":"ATG","iso_code_2_state":"AG"},{"name_state_en":"Azerbaijan","name_state_ru":"Азербайджан","iso_code_3_state":"AZE","iso_code_2_state":"AZ"},{"name_state_en":"Argentina","name_state_ru":"Аргентина","iso_code_3_state":"ARG","iso_code_2_state":"AR"},{"name_state_en":"Australia","name_state_ru":"Австралия","iso_code_3_state":"AUS","iso_code_2_state":"AU"},{"name_state_en":"Austria","name_state_ru":"Австрия","iso_code_3_state":"AUT","iso_code_2_state":"AT"},{"name_state_en":"Bahamas","name_state_ru":"Багамские Острова","iso_code_3_state":"BHS","iso_code_2_state":"BS"},{"name_state_en":"Bahrain","name_state_ru":"Бахрейн","iso_code_3_state":"BHR","iso_code_2_state":"BH"},{"name_state_en":"Bangladesh","name_state_ru":"Бангладеш","iso_code_3_state":"BGD","iso_code_2_state":"BD"},{"name_state_en":"Armenia","name_state_ru":"Армения","iso_code_3_state":"ARM","iso_code_2_state":"AM"},{"name_state_en":"Barbados","name_state_ru":"Барбадос","iso_code_3_state":"BRB","iso_code_2_state":"BB"},{"name_state_en":"Belgium","name_state_ru":"Бельгия","iso_code_3_state":"BEL","iso_code_2_state":"BE"},{"name_state_en":"Bermuda","name_state_ru":"Бермудские Острова","iso_code_3_state":"BMU","iso_code_2_state":"BM"},{"name_state_en":"Bhutan","name_state_ru":"Бутан","iso_code_3_state":"BTN","iso_code_2_state":"BT"},{"name_state_en":"Bolivia","name_state_ru":"Боливия","iso_code_3_state":"BOL","iso_code_2_state":"BO"},{"name_state_en":"Bosnia and Herzegovina","name_state_ru":"Босния и Герцеговина","iso_code_3_state":"BIH","iso_code_2_state":"BA"},{"name_state_en":"Botswana","name_state_ru":"Ботсвана","iso_code_3_state":"BWA","iso_code_2_state":"BW"},{"name_state_en":"Bouvet Island","name_state_ru":"Остров Буве","iso_code_3_state":"BVT","iso_code_2_state":"BV"},{"name_state_en":"Brazil","name_state_ru":"Бразилия","iso_code_3_state":"BRA","iso_code_2_state":"BR"},{"name_state_en":"Belize","name_state_ru":"Белиз","iso_code_3_state":"BLZ","iso_code_2_state":"BZ"},{"name_state_en":"British Indian Ocean Territory","name_state_ru":"Британская территория в Индийском океане","iso_code_3_state":"IOT","iso_code_2_state":"IO"},{"name_state_en":"Solomon Islands","name_state_ru":"Соломоновы Острова","iso_code_3_state":"SLB","iso_code_2_state":"SB"},{"name_state_en":"British Virgin Islands","name_state_ru":"Британские Виргинские острова","iso_code_3_state":"VGB","iso_code_2_state":"VG"},{"name_state_en":"Brunei Darussalam","name_state_ru":"Бруней","iso_code_3_state":"BRN","iso_code_2_state":"BN"},{"name_state_en":"Bulgaria","name_state_ru":"Болгария","iso_code_3_state":"BGR","iso_code_2_state":"BG"},{"name_state_en":"Myanmar","name_state_ru":"Мьянма","iso_code_3_state":"MMR","iso_code_2_state":"MM"},{"name_state_en":"Burundi","name_state_ru":"Бурунди","iso_code_3_state":"BDI","iso_code_2_state":"BI"},{"name_state_en":"Belarus","name_state_ru":"Белоруссия","iso_code_3_state":"BLR","iso_code_2_state":"BY"},{"name_state_en":"Cambodia","name_state_ru":"Камбоджа","iso_code_3_state":"KHM","iso_code_2_state":"KH"},{"name_state_en":"Cameroon","name_state_ru":"Камерун","iso_code_3_state":"CMR","iso_code_2_state":"CM"},{"name_state_en":"Canada","name_state_ru":"Канада","iso_code_3_state":"CAN","iso_code_2_state":"CA"},{"name_state_en":"Cabo Verde","name_state_ru":"Кабо-Верде","iso_code_3_state":"CPV","iso_code_2_state":"CV"},{"name_state_en":"Cayman Islands","name_state_ru":"Каймановы острова","iso_code_3_state":"CYM","iso_code_2_state":"KY"},{"name_state_en":"Central African Republic","name_state_ru":"Центральноафриканская Республика","iso_code_3_state":"CAF","iso_code_2_state":"CF"},{"name_state_en":"Sri Lanka","name_state_ru":"Шри-Ланка","iso_code_3_state":"LKA","iso_code_2_state":"LK"},{"name_state_en":"Chad","name_state_ru":"Чад","iso_code_3_state":"TCD","iso_code_2_state":"TD"},{"name_state_en":"Chile","name_state_ru":"Чили","iso_code_3_state":"CHL","iso_code_2_state":"CL"},{"name_state_en":"China","name_state_ru":"Китайская Народная Республика","iso_code_3_state":"CHN","iso_code_2_state":"CN"},{"name_state_en":"Taiwan","name_state_ru":"Тайвань","iso_code_3_state":"TWN","iso_code_2_state":"TW"},{"name_state_en":"Christmas Island","name_state_ru":"Остров Рождества","iso_code_3_state":"CXR","iso_code_2_state":"CX"},{"name_state_en":"Cocos Islands","name_state_ru":"Кокосовые острова","iso_code_3_state":"CCK","iso_code_2_state":"CC"},{"name_state_en":"Colombia","name_state_ru":"Колумбия","iso_code_3_state":"COL","iso_code_2_state":"CO"},{"name_state_en":"Comoros","name_state_ru":"Коморы","iso_code_3_state":"COM","iso_code_2_state":"KM"},{"name_state_en":"Mayotte","name_state_ru":"Майотта","iso_code_3_state":"MYT","iso_code_2_state":"YT"},{"name_state_en":"Congo","name_state_ru":"Республика Конго","iso_code_3_state":"COG","iso_code_2_state":"CG"},{"name_state_en":"The Democratic Republic of the Congo","name_state_ru":"Демократическая Республика Конго","iso_code_3_state":"COD","iso_code_2_state":"CD"},{"name_state_en":"Cook Islands","name_state_ru":"Острова Кука","iso_code_3_state":"COK","iso_code_2_state":"CK"},{"name_state_en":"Costa Rica","name_state_ru":"Коста-Рика","iso_code_3_state":"CRI","iso_code_2_state":"CR"},{"name_state_en":"Croatia","name_state_ru":"Хорватия","iso_code_3_state":"HRV","iso_code_2_state":"HR"},{"name_state_en":"Cuba","name_state_ru":"Куба","iso_code_3_state":"CUB","iso_code_2_state":"CU"},{"name_state_en":"Cyprus","name_state_ru":"Кипр","iso_code_3_state":"CYP","iso_code_2_state":"CY"},{"name_state_en":"Czechia","name_state_ru":"Чехия","iso_code_3_state":"CZE","iso_code_2_state":"CZ"},{"name_state_en":"Benin","name_state_ru":"Бенин","iso_code_3_state":"BEN","iso_code_2_state":"BJ"},{"name_state_en":"Denmark","name_state_ru":"Дания","iso_code_3_state":"DNK","iso_code_2_state":"DK"},{"name_state_en":"Dominica","name_state_ru":"Доминика","iso_code_3_state":"DMA","iso_code_2_state":"DM"},{"name_state_en":"Dominican Republic","name_state_ru":"Доминиканская Республика","iso_code_3_state":"DOM","iso_code_2_state":"DO"},{"name_state_en":"Ecuador","name_state_ru":"Эквадор","iso_code_3_state":"ECU","iso_code_2_state":"EC"},{"name_state_en":"El Salvador","name_state_ru":"Сальвадор","iso_code_3_state":"SLV","iso_code_2_state":"SV"},{"name_state_en":"Equatorial Guinea","name_state_ru":"Экваториальная Гвинея","iso_code_3_state":"GNQ","iso_code_2_state":"GQ"},{"name_state_en":"Ethiopia","name_state_ru":"Эфиопия","iso_code_3_state":"ETH","iso_code_2_state":"ET"},{"name_state_en":"Eritrea","name_state_ru":"Эритрея","iso_code_3_state":"ERI","iso_code_2_state":"ER"},{"name_state_en":"Estonia","name_state_ru":"Эстония","iso_code_3_state":"EST","iso_code_2_state":"EE"},{"name_state_en":"Faroe Islands","name_state_ru":"Фарерские острова","iso_code_3_state":"FRO","iso_code_2_state":"FO"},{"name_state_en":"Falkland Islands","name_state_ru":"Фолклендские острова","iso_code_3_state":"FLK","iso_code_2_state":"FK"},{"name_state_en":"South Georgia and the South Sandwich Islands","name_state_ru":"Южная Георгия и Южные Сандвичевы острова","iso_code_3_state":"SGS","iso_code_2_state":"GS"},{"name_state_en":"Fiji","name_state_ru":"Фиджи","iso_code_3_state":"FJI","iso_code_2_state":"FJ"},{"name_state_en":"Finland","name_state_ru":"Финляндия","iso_code_3_state":"FIN","iso_code_2_state":"FI"},{"name_state_en":"Åland Islands","name_state_ru":"Аландские острова","iso_code_3_state":"ALA","iso_code_2_state":"AX"},{"name_state_en":"France","name_state_ru":"Франция","iso_code_3_state":"FRA","iso_code_2_state":"FR"},{"name_state_en":"French Guiana","name_state_ru":"Французская Гвиана","iso_code_3_state":"GUF","iso_code_2_state":"GF"},{"name_state_en":"French Polynesia","name_state_ru":"Французская Полинезия","iso_code_3_state":"PYF","iso_code_2_state":"PF"},{"name_state_en":"French Southern Territories","name_state_ru":"Французские Южные и Антарктические территории","iso_code_3_state":"ATF","iso_code_2_state":"TF"},{"name_state_en":"Djibouti","name_state_ru":"Джибути","iso_code_3_state":"DJI","iso_code_2_state":"DJ"},{"name_state_en":"Gabon","name_state_ru":"Габон","iso_code_3_state":"GAB","iso_code_2_state":"GA"},{"name_state_en":"Georgia","name_state_ru":"Грузия","iso_code_3_state":"GEO","iso_code_2_state":"GE"},{"name_state_en":"Gambia","name_state_ru":"Гамбия","iso_code_3_state":"GMB","iso_code_2_state":"GM"},{"name_state_en":"Palestine","name_state_ru":"Палестина","iso_code_3_state":"PSE","iso_code_2_state":"PS"},{"name_state_en":"Germany","name_state_ru":"Германия","iso_code_3_state":"DEU","iso_code_2_state":"DE"},{"name_state_en":"Ghana","name_state_ru":"Гана","iso_code_3_state":"GHA","iso_code_2_state":"GH"},{"name_state_en":"Gibraltar","name_state_ru":"Гибралтар","iso_code_3_state":"GIB","iso_code_2_state":"GI"},{"name_state_en":"Kiribati","name_state_ru":"Кирибати","iso_code_3_state":"KIR","iso_code_2_state":"KI"},{"name_state_en":"Greece","name_state_ru":"Греция","iso_code_3_state":"GRC","iso_code_2_state":"GR"},{"name_state_en":"Greenland","name_state_ru":"Гренландия","iso_code_3_state":"GRL","iso_code_2_state":"GL"},{"name_state_en":"Grenada","name_state_ru":"Гренада","iso_code_3_state":"GRD","iso_code_2_state":"GD"},{"name_state_en":"Guadeloupe","name_state_ru":"Гваделупа","iso_code_3_state":"GLP","iso_code_2_state":"GP"},{"name_state_en":"Guam","name_state_ru":"Гуам","iso_code_3_state":"GUM","iso_code_2_state":"GU"},{"name_state_en":"Guatemala","name_state_ru":"Гватемала","iso_code_3_state":"GTM","iso_code_2_state":"GT"},{"name_state_en":"Guinea","name_state_ru":"Гвинея","iso_code_3_state":"GIN","iso_code_2_state":"GN"},{"name_state_en":"Guyana","name_state_ru":"Гайана","iso_code_3_state":"GUY","iso_code_2_state":"GY"},{"name_state_en":"Haiti","name_state_ru":"Республика Гаити","iso_code_3_state":"HTI","iso_code_2_state":"HT"},{"name_state_en":"Heard Island and McDonald Islands","name_state_ru":"Остров Херд и острова Макдональд","iso_code_3_state":"HMD","iso_code_2_state":"HM"},{"name_state_en":"Holy See","name_state_ru":"Ватикан","iso_code_3_state":"VAT","iso_code_2_state":"VA"},{"name_state_en":"Honduras","name_state_ru":"Гондурас","iso_code_3_state":"HND","iso_code_2_state":"HN"},{"name_state_en":"Hong Kong","name_state_ru":"Гонконг","iso_code_3_state":"HKG","iso_code_2_state":"HK"},{"name_state_en":"Hungary","name_state_ru":"Венгрия","iso_code_3_state":"HUN","iso_code_2_state":"HU"},{"name_state_en":"Iceland","name_state_ru":"Исландия","iso_code_3_state":"ISL","iso_code_2_state":"IS"},{"name_state_en":"India","name_state_ru":"Индия","iso_code_3_state":"IND","iso_code_2_state":"IN"},{"name_state_en":"Indonesia","name_state_ru":"Индонезия","iso_code_3_state":"IDN","iso_code_2_state":"ID"},{"name_state_en":"Iran","name_state_ru":"Иран","iso_code_3_state":"IRN","iso_code_2_state":"IR"},{"name_state_en":"Iraq","name_state_ru":"Ирак","iso_code_3_state":"IRQ","iso_code_2_state":"IQ"},{"name_state_en":"Ireland","name_state_ru":"Ирландия","iso_code_3_state":"IRL","iso_code_2_state":"IE"},{"name_state_en":"Israel","name_state_ru":"Израиль","iso_code_3_state":"ISR","iso_code_2_state":"IL"},{"name_state_en":"Italy","name_state_ru":"Италия","iso_code_3_state":"ITA","iso_code_2_state":"IT"},{"name_state_en":"Ivory Coast","name_state_ru":"Кот-д’Ивуар","iso_code_3_state":"CIV","iso_code_2_state":"CI"},{"name_state_en":"Jamaica","name_state_ru":"Ямайка","iso_code_3_state":"JAM","iso_code_2_state":"JM"},{"name_state_en":"Japan","name_state_ru":"Япония","iso_code_3_state":"JPN","iso_code_2_state":"JP"},{"name_state_en":"Kazakhstan","name_state_ru":"Казахстан","iso_code_3_state":"KAZ","iso_code_2_state":"KZ"},{"name_state_en":"Jordan","name_state_ru":"Иордания","iso_code_3_state":"JOR","iso_code_2_state":"JO"},{"name_state_en":"Kenya","name_state_ru":"Кения","iso_code_3_state":"KEN","iso_code_2_state":"KE"},{"name_state_en":"DPRK","name_state_ru":"КНДР","iso_code_3_state":"PRK","iso_code_2_state":"KP"},{"name_state_en":"Republic of Korea","name_state_ru":"Республика Корея","iso_code_3_state":"KOR","iso_code_2_state":"KR"},{"name_state_en":"Kuwait","name_state_ru":"Кувейт","iso_code_3_state":"KWT","iso_code_2_state":"KW"},{"name_state_en":"Kyrgyzstan","name_state_ru":"Киргизия","iso_code_3_state":"KGZ","iso_code_2_state":"KG"},{"name_state_en":"Lao","name_state_ru":"Лаос","iso_code_3_state":"LAO","iso_code_2_state":"LA"},{"name_state_en":"Lebanon","name_state_ru":"Ливан","iso_code_3_state":"LBN","iso_code_2_state":"LB"},{"name_state_en":"Lesotho","name_state_ru":"Лесото","iso_code_3_state":"LSO","iso_code_2_state":"LS"},{"name_state_en":"Latvia","name_state_ru":"Латвия","iso_code_3_state":"LVA","iso_code_2_state":"LV"},{"name_state_en":"Liberia","name_state_ru":"Либерия","iso_code_3_state":"LBR","iso_code_2_state":"LR"},{"name_state_en":"Libya","name_state_ru":"Ливия","iso_code_3_state":"LBY","iso_code_2_state":"LY"},{"name_state_en":"Liechtenstein","name_state_ru":"Лихтенштейн","iso_code_3_state":"LIE","iso_code_2_state":"LI"},{"name_state_en":"Lithuania","name_state_ru":"Литва","iso_code_3_state":"LTU","iso_code_2_state":"LT"},{"name_state_en":"Luxembourg","name_state_ru":"Люксембург","iso_code_3_state":"LUX","iso_code_2_state":"LU"},{"name_state_en":"Macao","name_state_ru":"Макао","iso_code_3_state":"MAC","iso_code_2_state":"MO"},{"name_state_en":"Madagascar","name_state_ru":"Мадагаскар","iso_code_3_state":"MDG","iso_code_2_state":"MG"},{"name_state_en":"Malawi","name_state_ru":"Малави","iso_code_3_state":"MWI","iso_code_2_state":"MW"},{"name_state_en":"Malaysia","name_state_ru":"Малайзия","iso_code_3_state":"MYS","iso_code_2_state":"MY"},{"name_state_en":"Maldives","name_state_ru":"Мальдивы","iso_code_3_state":"MDV","iso_code_2_state":"MV"},{"name_state_en":"Mali","name_state_ru":"Мали","iso_code_3_state":"MLI","iso_code_2_state":"ML"},{"name_state_en":"Malta","name_state_ru":"Мальта","iso_code_3_state":"MLT","iso_code_2_state":"MT"},{"name_state_en":"Martinique","name_state_ru":"Мартиника","iso_code_3_state":"MTQ","iso_code_2_state":"MQ"},{"name_state_en":"Mauritania","name_state_ru":"Мавритания","iso_code_3_state":"MRT","iso_code_2_state":"MR"},{"name_state_en":"Mauritius","name_state_ru":"Маврикий","iso_code_3_state":"MUS","iso_code_2_state":"MU"},{"name_state_en":"Mexico","name_state_ru":"Мексика","iso_code_3_state":"MEX","iso_code_2_state":"MX"},{"name_state_en":"Monaco","name_state_ru":"Монако","iso_code_3_state":"MCO","iso_code_2_state":"MC"},{"name_state_en":"Mongolia","name_state_ru":"Монголия","iso_code_3_state":"MNG","iso_code_2_state":"MN"},{"name_state_en":"Moldova","name_state_ru":"Молдавия","iso_code_3_state":"MDA","iso_code_2_state":"MD"},{"name_state_en":"Montenegro","name_state_ru":"Черногория","iso_code_3_state":"MNE","iso_code_2_state":"ME"},{"name_state_en":"Montserrat","name_state_ru":"Монтсеррат","iso_code_3_state":"MSR","iso_code_2_state":"MS"},{"name_state_en":"Morocco","name_state_ru":"Марокко","iso_code_3_state":"MAR","iso_code_2_state":"MA"},{"name_state_en":"Mozambique","name_state_ru":"Мозамбик","iso_code_3_state":"MOZ","iso_code_2_state":"MZ"},{"name_state_en":"Oman","name_state_ru":"Оман","iso_code_3_state":"OMN","iso_code_2_state":"OM"},{"name_state_en":"Namibia","name_state_ru":"Намибия","iso_code_3_state":"NAM","iso_code_2_state":"NA"},{"name_state_en":"Nauru","name_state_ru":"Науру","iso_code_3_state":"NRU","iso_code_2_state":"NR"},{"name_state_en":"Nepal","name_state_ru":"Непал","iso_code_3_state":"NPL","iso_code_2_state":"NP"},{"name_state_en":"Netherlands","name_state_ru":"Нидерланды","iso_code_3_state":"NLD","iso_code_2_state":"NL"},{"name_state_en":"Curaçao","name_state_ru":"Кюрасао","iso_code_3_state":"CUW","iso_code_2_state":"CW"},{"name_state_en":"Aruba","name_state_ru":"Аруба","iso_code_3_state":"ABW","iso_code_2_state":"AW"},{"name_state_en":"Sint Maarten","name_state_ru":"Синт-Мартен","iso_code_3_state":"SXM","iso_code_2_state":"SX"},{"name_state_en":"Bonaire, Sint Eustatius and Saba","name_state_ru":"Бонэйр, Синт-Эстатиус и Саба","iso_code_3_state":"BES","iso_code_2_state":"BQ"},{"name_state_en":"New Caledonia","name_state_ru":"Новая Каледония","iso_code_3_state":"NCL","iso_code_2_state":"NC"},{"name_state_en":"Vanuatu","name_state_ru":"Вануату","iso_code_3_state":"VUT","iso_code_2_state":"VU"},{"name_state_en":"New Zealand","name_state_ru":"Новая Зеландия","iso_code_3_state":"NZL","iso_code_2_state":"NZ"},{"name_state_en":"Nicaragua","name_state_ru":"Никарагуа","iso_code_3_state":"NIC","iso_code_2_state":"NI"},{"name_state_en":"Niger","name_state_ru":"Нигер","iso_code_3_state":"NER","iso_code_2_state":"NE"},{"name_state_en":"Nigeria","name_state_ru":"Нигерия","iso_code_3_state":"NGA","iso_code_2_state":"NG"},{"name_state_en":"Niue","name_state_ru":"Ниуэ","iso_code_3_state":"NIU","iso_code_2_state":"NU"},{"name_state_en":"Norfolk Island","name_state_ru":"Норфолк","iso_code_3_state":"NFK","iso_code_2_state":"NF"},{"name_state_en":"Norway","name_state_ru":"Норвегия","iso_code_3_state":"NOR","iso_code_2_state":"NO"},{"name_state_en":"Northern Mariana Islands","name_state_ru":"Северные Марианские острова","iso_code_3_state":"MNP","iso_code_2_state":"MP"},{"name_state_en":"United States Minor Outlying Islands","name_state_ru":"Внешние малые острова США","iso_code_3_state":"UMI","iso_code_2_state":"UM"},{"name_state_en":"Micronesia","name_state_ru":"Микронезия","iso_code_3_state":"FSM","iso_code_2_state":"FM"},{"name_state_en":"Marshall Islands","name_state_ru":"Маршалловы Острова","iso_code_3_state":"MHL","iso_code_2_state":"MH"},{"name_state_en":"Palau","name_state_ru":"Палау","iso_code_3_state":"PLW","iso_code_2_state":"PW"},{"name_state_en":"Pakistan","name_state_ru":"Пакистан","iso_code_3_state":"PAK","iso_code_2_state":"PK"},{"name_state_en":"Panama","name_state_ru":"Панама","iso_code_3_state":"PAN","iso_code_2_state":"PA"},{"name_state_en":"Papua New Guinea","name_state_ru":"Папуа — Новая Гвинея","iso_code_3_state":"PNG","iso_code_2_state":"PG"},{"name_state_en":"Paraguay","name_state_ru":"Парагвай","iso_code_3_state":"PRY","iso_code_2_state":"PY"},{"name_state_en":"Peru","name_state_ru":"Перу","iso_code_3_state":"PER","iso_code_2_state":"PE"},{"name_state_en":"Philippines","name_state_ru":"Филиппины","iso_code_3_state":"PHL","iso_code_2_state":"PH"},{"name_state_en":"Pitcairn","name_state_ru":"Острова Питкэрн","iso_code_3_state":"PCN","iso_code_2_state":"PN"},{"name_state_en":"Poland","name_state_ru":"Польша","iso_code_3_state":"POL","iso_code_2_state":"PL"},{"name_state_en":"Portugal","name_state_ru":"Португалия","iso_code_3_state":"PRT","iso_code_2_state":"PT"},{"name_state_en":"Guinea-Bissau","name_state_ru":"Гвинея-Бисау","iso_code_3_state":"GNB","iso_code_2_state":"GW"},{"name_state_en":"Timor-Leste","name_state_ru":"Восточный Тимор","iso_code_3_state":"TLS","iso_code_2_state":"TL"},{"name_state_en":"Puerto Rico","name_state_ru":"Пуэрто-Рико","iso_code_3_state":"PRI","iso_code_2_state":"PR"},{"name_state_en":"Qatar","name_state_ru":"Катар","iso_code_3_state":"QAT","iso_code_2_state":"QA"},{"name_state_en":"Réunion","name_state_ru":"Реюньон","iso_code_3_state":"REU","iso_code_2_state":"RE"},{"name_state_en":"Romania","name_state_ru":"Румыния","iso_code_3_state":"ROU","iso_code_2_state":"RO"},{"name_state_en":"Russian Federation","name_state_ru":"Россия","iso_code_3_state":"RUS","iso_code_2_state":"RU"},{"name_state_en":"Rwanda","name_state_ru":"Руанда","iso_code_3_state":"RWA","iso_code_2_state":"RW"},{"name_state_en":"Saint Barthélemy","name_state_ru":"Сен-Бартелеми","iso_code_3_state":"BLM","iso_code_2_state":"BL"},{"name_state_en":"Saint Helena, Ascension and Tristan da Cunha","name_state_ru":"Острова Святой Елены, Вознесения и Тристан-да-Кунья","iso_code_3_state":"SHN","iso_code_2_state":"SH"},{"name_state_en":"Saint Kitts and Nevis","name_state_ru":"Сент-Китс и Невис","iso_code_3_state":"KNA","iso_code_2_state":"KN"},{"name_state_en":"Anguilla","name_state_ru":"Ангилья","iso_code_3_state":"AIA","iso_code_2_state":"AI"},{"name_state_en":"Saint Lucia","name_state_ru":"Сент-Люсия","iso_code_3_state":"LCA","iso_code_2_state":"LC"},{"name_state_en":"Saint Martin","name_state_ru":"Сен-Мартен","iso_code_3_state":"MAF","iso_code_2_state":"MF"},{"name_state_en":"Saint Pierre and Miquelon","name_state_ru":"Сен-Пьер и Микелон","iso_code_3_state":"SPM","iso_code_2_state":"PM"},{"name_state_en":"Saint Vincent and the Grenadines","name_state_ru":"Сент-Винсент и Гренадины","iso_code_3_state":"VCT","iso_code_2_state":"VC"},{"name_state_en":"San Marino","name_state_ru":"Сан-Марино","iso_code_3_state":"SMR","iso_code_2_state":"SM"},{"name_state_en":"Sao Tome and Principe","name_state_ru":"Сан-Томе и Принсипи","iso_code_3_state":"STP","iso_code_2_state":"ST"},{"name_state_en":"Saudi Arabia","name_state_ru":"Саудовская Аравия","iso_code_3_state":"SAU","iso_code_2_state":"SA"},{"name_state_en":"Senegal","name_state_ru":"Сенегал","iso_code_3_state":"SEN","iso_code_2_state":"SN"},{"name_state_en":"Serbia","name_state_ru":"Сербия","iso_code_3_state":"SRB","iso_code_2_state":"RS"},{"name_state_en":"Seychelles","name_state_ru":"Сейшельские Острова","iso_code_3_state":"SYC","iso_code_2_state":"SC"},{"name_state_en":"Sierra Leone","name_state_ru":"Сьерра-Леоне","iso_code_3_state":"SLE","iso_code_2_state":"SL"},{"name_state_en":"Singapore","name_state_ru":"Сингапур","iso_code_3_state":"SGP","iso_code_2_state":"SG"},{"name_state_en":"Slovakia","name_state_ru":"Словакия","iso_code_3_state":"SVK","iso_code_2_state":"SK"},{"name_state_en":"Viet Nam","name_state_ru":"Вьетнам","iso_code_3_state":"VNM","iso_code_2_state":"VN"},{"name_state_en":"Slovenia","name_state_ru":"Словения","iso_code_3_state":"SVN","iso_code_2_state":"SI"},{"name_state_en":"Somalia","name_state_ru":"Сомали","iso_code_3_state":"SOM","iso_code_2_state":"SO"},{"name_state_en":"South Africa","name_state_ru":"Южно-Африканская Республика","iso_code_3_state":"ZAF","iso_code_2_state":"ZA"},{"name_state_en":"Zimbabwe","name_state_ru":"Зимбабве","iso_code_3_state":"ZWE","iso_code_2_state":"ZW"},{"name_state_en":"Spain","name_state_ru":"Испания","iso_code_3_state":"ESP","iso_code_2_state":"ES"},{"name_state_en":"South Sudan","name_state_ru":"Южный Судан","iso_code_3_state":"SSD","iso_code_2_state":"SS"},{"name_state_en":"Sudan","name_state_ru":"Судан","iso_code_3_state":"SDN","iso_code_2_state":"SD"},{"name_state_en":"Western Sahara","name_state_ru":"Западная Сахара","iso_code_3_state":"ESH","iso_code_2_state":"EH"},{"name_state_en":"Suriname","name_state_ru":"Суринам","iso_code_3_state":"SUR","iso_code_2_state":"SR"},{"name_state_en":"Svalbard and Jan Mayen","name_state_ru":"Шпицберген и Ян-Майен","iso_code_3_state":"SJM","iso_code_2_state":"SJ"},{"name_state_en":"Swaziland","name_state_ru":"Свазиленд","iso_code_3_state":"SWZ","iso_code_2_state":"SZ"},{"name_state_en":"Sweden","name_state_ru":"Швеция","iso_code_3_state":"SWE","iso_code_2_state":"SE"},{"name_state_en":"Switzerland","name_state_ru":"Швейцария","iso_code_3_state":"CHE","iso_code_2_state":"CH"},{"name_state_en":"Syrian Arab Republic","name_state_ru":"Сирия","iso_code_3_state":"SYR","iso_code_2_state":"SY"},{"name_state_en":"Tajikistan","name_state_ru":"Таджикистан","iso_code_3_state":"TJK","iso_code_2_state":"TJ"},{"name_state_en":"Thailand","name_state_ru":"Таиланд","iso_code_3_state":"THA","iso_code_2_state":"TH"},{"name_state_en":"Togo","name_state_ru":"Того","iso_code_3_state":"TGO","iso_code_2_state":"TG"},{"name_state_en":"Tokelau","name_state_ru":"Токелау","iso_code_3_state":"TKL","iso_code_2_state":"TK"},{"name_state_en":"Tonga","name_state_ru":"Тонга","iso_code_3_state":"TON","iso_code_2_state":"TO"},{"name_state_en":"Trinidad and Tobago","name_state_ru":"Тринидад и Тобаго","iso_code_3_state":"TTO","iso_code_2_state":"TT"},{"name_state_en":"United Arab Emirates","name_state_ru":"Объединённые Арабские Эмираты","iso_code_3_state":"ARE","iso_code_2_state":"AE"},{"name_state_en":"Tunisia","name_state_ru":"Тунис","iso_code_3_state":"TUN","iso_code_2_state":"TN"},{"name_state_en":"Turkey","name_state_ru":"Турция","iso_code_3_state":"TUR","iso_code_2_state":"TR"},{"name_state_en":"Turkmenistan","name_state_ru":"Туркмения","iso_code_3_state":"TKM","iso_code_2_state":"TM"},{"name_state_en":"Turks and Caicos Islands","name_state_ru":"Теркс и Кайкос","iso_code_3_state":"TCA","iso_code_2_state":"TC"},{"name_state_en":"Tuvalu","name_state_ru":"Тувалу","iso_code_3_state":"TUV","iso_code_2_state":"TV"},{"name_state_en":"Uganda","name_state_ru":"Уганда","iso_code_3_state":"UGA","iso_code_2_state":"UG"},{"name_state_en":"Ukraine","name_state_ru":"Украина","iso_code_3_state":"UKR","iso_code_2_state":"UA"},{"name_state_en":"Macedonia","name_state_ru":"Республика Македония","iso_code_3_state":"MKD","iso_code_2_state":"MK"},{"name_state_en":"Egypt","name_state_ru":"Египет","iso_code_3_state":"EGY","iso_code_2_state":"EG"},{"name_state_en":"United Kingdom","name_state_ru":"Великобритания","iso_code_3_state":"GBR","iso_code_2_state":"GB"},{"name_state_en":"Guernsey","name_state_ru":"Гернси","iso_code_3_state":"GGY","iso_code_2_state":"GG"},{"name_state_en":"Jersey","name_state_ru":"Джерси","iso_code_3_state":"JEY","iso_code_2_state":"JE"},{"name_state_en":"Isle of Man","name_state_ru":"Остров Мэн","iso_code_3_state":"IMN","iso_code_2_state":"IM"},{"name_state_en":"Tanzania, United Republic of","name_state_ru":"Танзания","iso_code_3_state":"TZA","iso_code_2_state":"TZ"},{"name_state_en":"United States of America","name_state_ru":"Соединённые Штаты Америки","iso_code_3_state":"USA","iso_code_2_state":"US"},{"name_state_en":"U.S. Virgin Islands","name_state_ru":"Виргинские Острова США","iso_code_3_state":"VIR","iso_code_2_state":"VI"},{"name_state_en":"Burkina Faso","name_state_ru":"Буркина-Фасо","iso_code_3_state":"BFA","iso_code_2_state":"BF"},{"name_state_en":"Uruguay","name_state_ru":"Уругвай","iso_code_3_state":"URY","iso_code_2_state":"UY"},{"name_state_en":"Uzbekistan","name_state_ru":"Узбекистан","iso_code_3_state":"UZB","iso_code_2_state":"UZ"},{"name_state_en":"Venezuela","name_state_ru":"Венесуэла","iso_code_3_state":"VEN","iso_code_2_state":"VE"},{"name_state_en":"Wallis and Futuna","name_state_ru":"Уоллис и Футуна","iso_code_3_state":"WLF","iso_code_2_state":"WF"},{"name_state_en":"Samoa","name_state_ru":"Самоа","iso_code_3_state":"WSM","iso_code_2_state":"WS"},{"name_state_en":"Yemen","name_state_ru":"Йемен","iso_code_3_state":"YEM","iso_code_2_state":"YE"},{"name_state_en":"Zambia","name_state_ru":"Замбия","iso_code_3_state":"ZMB","iso_code_2_state":"ZM"}]
';


$states_arr = json_decode($states_json, true);

$i = 1;
foreach ($states_arr as $value) {
    State::create([
        'name_state_en'=>$value['name_state_en'],
        'name_state_ru'=>$value['name_state_ru'],
        'iso_code_3_state'=>$value['iso_code_3_state'],
        'iso_code_2_state'=>$value['iso_code_2_state'],
    ]);
    echo "Запись №$i в таблицу states прошла успешно! \n";
    $i++;
}
echo "Государства добавлены таблицу states успешно!!! \n";









// Связываем валюты и государства использую коды государств 
$currencies = DB::table('currencies')->get();
$states = DB::table('states')->get();

// Выявляем совпадения iso state code у таблицы валюты и таблицы государства
foreach ($currencies as $value1) {
    foreach ($states as $value2) {
        if ($value1->iso_code_state == $value2->iso_code_3_state) {
            //echo $value2->name_state_ru.$value2->id.' = '.$value1->name_currency_ru.$value1->id.'<br>';
            // Записывем в базу данных
            DB::table('states')->where('id', $value2->id)->update(['currency_id' => $value1->id]);
            break;
        }
    }
}

// У части государств отсутствует валюта
$states_with_null = DB::table('states')->where('currency_id', '=', NULL)->get();
/*
echo "<h3>Список государств у которых отсутствует валюта</h3>";
?><?='<pre>';?><? print_r($states_with_null);?><?='</pre>';?><?
*/


// Связываем валюты и государства использую коды государств 
// создаем массив стран использующих доллары
$USD = array('MHL','TLS','BES','UMI','FSM','ASM', 'IOT', 'VGB','ECU', 'GUM', 'MNP', 'PLW', 'PRI', 'TCA', 'VIR');
$EUR = array(
    'ALA', 'FRA', 'GUF', 'GLP', 'GRC', 'MLT', 'MAF', 'SPM', 'AND' ,'AUT','BEL', 'MYT', 'CYP','EST',
    'FIN', 'DEU', 'VAT', 'IRL', 'ITA', 'LVA', 'LUX', 'MTQ', 'MCO', 'MNE', 'NLD', 'PRT', 'REU', 'BLM',
    'SMR', 'SVK', 'SVN', 'ESP'
);
$XPF = array('PYF', 'NCL', 'WLF');
$DKK = array('GRL', 'FRO');
$XCD = array('GRD', 'AIA', 'LCA', 'VCT', 'ATG', 'DMA', 'MSR', 'KNA');
$XOF = array('GNB', 'BEN', 'CIV', 'MLI', 'NER', 'SEN', 'TGO', 'BFA');
$GBP = array('JEY', 'SGS', 'GGY', 'IMN');
$XAF = array('CMR', 'CAF', 'TCD', 'COG', 'GNQ', 'GAB');
$AUD = array('CXR', 'CCK', 'KIR', 'NRU', 'TUV');
$NZD = array('COK', 'NIU', 'PCN', 'TKL');
$ILS = array('PSE');
$CHF = array('LIE');
$ANG = array('CUW', 'SXM');




foreach ($states_with_null as $value1) {

    // перебор массива USD
    foreach ($USD as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'USD')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива EUR
    foreach ($EUR as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'EUR')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива XPF
    foreach ($XPF as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'XPF')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива DKK
    foreach ($DKK as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'DKK')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива XCD
    foreach ($XCD as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'XCD')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива XOF
    foreach ($XOF as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'XOF')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива GBP
    foreach ($GBP as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'GBP')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива XAF
    foreach ($XAF as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'XAF')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива AUD
    foreach ($AUD as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'AUD')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива NZD
    foreach ($NZD as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'NZD')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива ILS
    foreach ($ILS as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'ILS')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива CHF
    foreach ($CHF as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'CHF')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

    // перебор массива ANG
    foreach ($ANG as $value2) {
        if ($value1->iso_code_3_state == $value2) {
            $currencies_code = DB::table('currencies')->where('iso_4217_code_currency_literal', '=', 'ANG')->get();
            foreach ($currencies_code as $value3) {
                // Записывем в базу данных
                DB::table('states')->where('iso_code_3_state', $value1->iso_code_3_state)
                ->update(['currency_id' => $value3->id]);
            }
        }
    }

}

    }
}
