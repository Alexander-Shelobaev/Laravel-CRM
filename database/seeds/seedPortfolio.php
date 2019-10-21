<?php

use Illuminate\Database\Seeder;
// php artisan db:seed --class=seedPortfolio
class seedPortfolio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {

    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('Платёжный плагин для wordpress', 'Разработка платежного плагина для CMS WordPress', 'https://securepayments.sberbank.ru/wiki/doku.php/integration:cms:wordpress:start', 'work-img-1.jpg')";
    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('Платёжный плагин для 1с-битрикс', 'Разработка платежного плагина для CMS 1С Битрикс', 'https://securepayments.sberbank.ru/wiki/doku.php/integration:cms:1c_bitrix:start', 'work-img-2.jpg')";
    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('ОППК', 'По заданию Министерства Экономического развития Российской Федерации выполнило НИОКР на разработку облачной платформы, оценка эффективности, моделирование и документирование', '/documents/EPPK.pdf', 'work-img-3.jpg')";
    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('ЦАОН', 'Создание дистрибутивной системы авиа-услуг: авиаработы, виртуальный оператор, авиауслуги, управление парком', '/documents/GDS_1.1.pdf', 'work-img-4.jpg')";
    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('Портал росатом', 'Партнерский портал государственной корпорации Росатом, автоматизированная система обработки заявок от партнеров', 'http://moz-gos.ru/', 'work-img-5.jpg')";
    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('АК «ТРАНСАЭРО»', 'Система информирования частолетающих пассажиров для российской авиакомпании', 'http://www.transaero.ru/', 'work-img-6.jpg')";
    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('ЗАВОД ЮРИМ', 'Проект по внедрению и сопровождению комплексной системы управления операционной деятельностью предприятия', 'http://www.yurim.ru/', 'work-img-7.jpg')";
    	$querys[] = "INSERT INTO portfolios(title, short_text, href, img) VALUES('СУБПОДРЯД', 'Более 50 проектов заказной разработки на субподряде. Генеральные клиента от Аэрофлота до Росатома', '/documents/subcontracting.pdf', 'work-img-8.jpg')";

    	$link = mysqli_connect(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE')) or die("Ошибка: " . mysqli_error($link));
    	foreach ($querys as $query){
    		$res = mysqli_query($link, $query);
    	}

    }
}

?>