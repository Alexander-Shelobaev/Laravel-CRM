<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//////////////////////////////////////// Пользовательска часть ////////////////////////////////////////

// Роуты для пользовательской (Landing), по умолчанию используют 'middleware'=>'web'
Route::group([],function() {
    // Роут для главной страницы (/)
	Route::match(['get','post'],'/',['uses'=>'LandingController@Landing','as'=>'landingHome']);
    // Роуты для вывода сервисов (/service/text)
	//Route::get('/service/{alias}',['uses'=>'LandingController@LandingServices','as'=>'service']);
    // Роуты для вывода новостей (/service/text)
	Route::get('/news/{alias}',['uses'=>'LandingController@LandingNews','as'=>'news']);
});


//////////////////////////////////////// Административная часть ////////////////////////////////////////

// Роуты для страниц регистрации, авторизации, восстановления пароля
Auth::routes();

Route::group(['middleware'=>['web']], function() {

    // После успешно авторизации происходит переход на /home, контролер выполняет redirect('/admin')
    Route::get('/home', 'adminController@index')->name('home');

    Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function() {

        Route::get('/',['uses'=>'adminController@Admin','as'=>'admin']);

        Route::resource('/chat','ChatResourceController');
        //Route::resource('/chat',['uses'=>'ChatResourceController','as'=>'chat']);

        // Роут для управления пользователями
        Route::group(['prefix'=>'user-management','namespace'=>'Users'],function() {
            Route::resource('/users','userController');
            Route::resource('/roles','roleController');
            Route::resource('/permissions','permissionController');
        });

        // Роут для контента
        Route::group(['prefix'=>'content','namespace'=>'Content'],function() {
            Route::resource('/services','serviceController');
            Route::resource('/portfolios','portfolioController');
            Route::resource('/news','newsController');
        });

        // Роут для справочников
        Route::group(['prefix'=>'handbook','namespace'=>'Handbook'],function() {
            Route::resource('/currencies','currenciesController');
            Route::resource('/states','statesController');
            Route::resource('/cities','citiesController');
            Route::resource('/airfields','airfieldsController');
        });

        Route::get('app-desc', function () {return view('admin.app-desc');});
        Route::get('feedback-form', function () {return view('admin.feedback-form');});

    });

});
