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


Route::get('/', function () {
    return view('welcome');
});


Route::get('login',['as' => 'sign_in', 'uses' => 'AuthController@showLoginForm']);
Route::post('sign-in',['as' => 'login', 'uses' => 'AuthController@login']);


Route::group(['middleware' => ['auth', 'web']], function (){

    Route::post('/logout',['as' => 'logout', 'uses' => 'AuthController@logout']);

    Route::get('/home', ['as' => 'home', 'uses' => 'ManagerController@home']);

    Route::get('cities', ['as' => 'cities', 'uses' => 'CitiesController@index']);
    Route::post('city-create', ['as' => 'city_create', 'uses' => 'CitiesController@cityCreate']);
    Route::get('city-edit/{id}', ['as' => 'city_edit', 'uses' => 'CitiesController@cityEdit' ]);
    Route::PUT('city-edit/{id}', ['as' => 'city_update', 'uses'=> 'CitiesController@updateCity']);

    Route::get('zones', ['as' => 'zones', 'uses' => 'ZonesController@index']);
    Route::post('zone-create', ['as' => 'zone_create', 'uses' => 'ZonesController@zoneCreate']);
    Route::get('zone-edit/{id}', ['as' => 'zone_edit', 'uses' => 'ZonesController@zoneEdit' ]);
    Route::PUT('zone-edit/{id}', ['as' => 'zone_update', 'uses'=> 'ZonesController@updateZone']);
    Route::get('zone-delete/{id}', ['as' => 'zone_delete', 'uses'=> 'ZonesController@zoneDelete']);


    Route::get('promoters',['as' => 'promoters', 'uses' => 'PromoterController@index']);
    Route::get('promoter-create', ['as' => 'create_promoter', 'uses' => 'PromoterController@create']);
    Route::post('promoter/create', ['as' => 'promoter_create', 'uses' => 'PromoterController@promoterCreate']);

});


