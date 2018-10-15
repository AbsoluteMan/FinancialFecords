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


Route::group(['middleware'=>['web','admin.login']],function(){

    Route::get('index','IndexController@main');

    Route::any('setting','IndexController@setting');

    Route::any('income','IndexController@income');

    Route::any('pay','IndexController@pay');

    Route::any('detailed','IndexController@detailed');

    Route::any('detailedall/{id}','IndexController@detailedall');

    Route::get('LendIndex','LendController@LendIndex');

    Route::any('/Lend/form','LendController@Lendform');

    Route::any('/Lend/return','LendController@Lendreturn');

    Route::any('/Lend/Page/{id}','LendController@lendpage');

    Route::post('/Lend/ajax','LendController@ajax');

    Route::post('/Lend/getajax','LendController@getajax');

    Route::post('/Lend/ajax_returnd','LendController@ajax_returnd');

    Route::get('quit','LoginController@quit');

});

Route::any('/', 'LoginController@login');

Route::get('crypt','LoginController@crypt');
