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



/**
 * Роуты для страниц регистрации, авторизации, восстановления пароля
 */
Auth::routes();



/**
 * Пользовательска часть
 */
Route::group([], function () {
    // Роут для главной страницы (/)
    Route::match(['get','post'], '/', ['uses'=>'LandingController@landing','as'=>'landingHome']);
    // Роуты для вывода новостей (/service/text)
    Route::get('/news/{alias}', ['uses'=>'LandingController@landingNews','as'=>'news']);
});



/**
 * Административная часть
 */
Route::group(['middleware'=>['web']], function () {

    // После успешно авторизации происходит переход на /home
    Route::get('/home', 'AdminController@index')->name('home');
    Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {

        Route::get('/', ['uses'=>'AdminController@admin','as'=>'admin']);
        // Роут для управления пользователями
        Route::group(['prefix'=>'user-management','namespace'=>'Users'], function () {
            Route::resource('/users', 'UserController');
            Route::resource('/roles', 'RoleController');
            Route::resource('/permissions', 'PermissionController');
        });
        // Роут для контента
        Route::group(['prefix'=>'content','namespace'=>'Content'], function () {
            Route::resource('/services', 'ServiceController');
            Route::resource('/portfolios', 'PortfolioController');
            Route::resource('/news', 'NewsController');
        });
        // Роут для справочников
        Route::group(['prefix'=>'handbook','namespace'=>'Handbook'], function () {
            Route::resource('/currencies', 'CurrenciesController');
            Route::resource('/states', 'StatesController');
            Route::resource('/cities', 'CitiesController');
            Route::resource('/airfields', 'AirfieldsController');
        });

        Route::get('app-desc', function () {
            return view('admin.app-desc');
        });
        Route::get('feedback-form', function () {
            return view('admin.feedback-form');
        });

    });

});
