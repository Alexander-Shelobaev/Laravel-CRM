<?php

use Illuminate\Database\Seeder;
use App\Portfolio;

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

        Portfolio::create([
            'title'=>'Платёжный плагин для wordpress',
            'short_text'=>'Разработка платежного плагина для CMS WordPress',
            'href'=>'https://securepayments.sberbank.ru/wiki/doku.php/integration:cms:wordpress:start',
            'img'=>'work-img-1.jpg'
        ]);
        Portfolio::create([
            'title'=>'Платёжный плагин для 1с-битрикс',
            'short_text'=>'Разработка платежного плагина для CMS 1С Битрикс',
            'href'=>'https://securepayments.sberbank.ru/wiki/doku.php/integration:cms:1c_bitrix:start',
            'img'=>'work-img-2.jpg'
        ]);
        Portfolio::create([
            'title'=>'ОППК',
            'short_text'=>'По заданию Министерства Экономического развития Российской Федерации выполнило 
            НИОКР на разработку облачной платформы, оценка эффективности, моделирование и документирование',
            'href'=>'/documents/EPPK.pdf',
            'img'=>'work-img-3.jpg'
        ]);
        Portfolio::create([
            'title'=>'ЦАОН',
            'short_text'=>'Создание дистрибутивной системы авиа-услуг: авиаработы, виртуальный оператор, 
            авиауслуги, управление парком',
            'href'=>'/documents/GDS_1.1.pdf',
            'img'=>'work-img-4.jpg'
        ]);
        Portfolio::create([
            'title'=>'Портал росатом',
            'short_text'=>'Партнерский портал государственной корпорации Росатом, автоматизированная система 
            обработки заявок от партнеров',
            'href'=>'http://moz-gos.ru/',
            'img'=>'work-img-5.jpg'
        ]);
        Portfolio::create([
            'title'=>'АК «ТРАНСАЭРО»',
            'short_text'=>'Система информирования частолетающих пассажиров для российской авиакомпании',
            'href'=>'http://www.transaero.ru/',
            'img'=>'work-img-6.jpg'
        ]);
        Portfolio::create([
            'title'=>'ЗАВОД ЮРИМ',
            'short_text'=>'Проект по внедрению и сопровождению комплексной системы управления операционной 
            деятельностью предприятия',
            'href'=>'http://www.yurim.ru/',
            'img'=>'work-img-7.jpg'
        ]);
        Portfolio::create([
            'title'=>'СУБПОДРЯД',
            'short_text'=>'Более 50 проектов заказной разработки на субподряде. Генеральные клиента от Аэрофлота 
            до Росатома',
            'href'=>'/documents/subcontracting.pdf',
            'img'=>'work-img-8.jpg'
        ]);
        
    }
}
