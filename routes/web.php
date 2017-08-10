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
Route::get('birthday-godfathers', ['as' => 'birthday_godfathers', 'uses' => 'ManagerController@birthdayGodfathers' ]);
Route::get('dashborad', ['as' => 'dashboard', 'uses' => 'ManagerController@dashboard']);
Route::get('icons', ['as' => 'icons', 'uses' => 'ManagerController@icons']);
Route::get('maps', ['as' => 'maps', 'uses' => 'ManagerController@maps']);
Route::get('notifications', ['as' => 'notifications', 'uses' => 'ManagerController@notifications']);
Route::get('table', ['as' => 'table', 'uses' => 'ManagerController@table']);
Route::get('template', ['as' => 'template', 'uses' => 'ManagerController@template']);
Route::get('typography', ['as' => 'typography', 'uses' => 'ManagerController@typography']);
Route::get('upgrade', ['as' => 'upgrade', 'uses' => 'ManagerController@upgrade']);
Route::get('birthday-godfathers', ['as' => 'birthday_godfathers', 'uses' => 'ManagerController@BirthdayGodfathers']);
Route::get('birthday-godchildrens', ['as' => 'birthday_godchildrens', 'uses' => 'ManagerController@BirthdayGodchildrens']);
Route::get('birthday-employees', ['as' => 'birthday_employees', 'uses' => 'ManagerController@BirthdayEmployees']);





Route::get('admin/users', ['as' => 'dashboard_users', 'uses' => 'UsersController@index']);
Route::get('admin/user-create', ['as' => 'dashboard_user_create', 'uses' => 'UsersController@userCreate']);
Route::post('admin/user-create', ['as' => 'dashboard_user_create', 'uses' => 'UsersController@createUser']);
Route::get('admin/user-edit/{id}', ['as' => 'dashboard_user_edit', 'uses' => 'UsersController@userEdit']);
Route::put('admin/user-update{id}', ['as' => 'dashboard_user_update', 'uses' => 'UsersController@updateUser']);

Route::get('admin/cities', ['as' => 'dashboard_cities', 'uses' => 'CitiesController@index']);
Route::post('admin/city-create', ['as' => 'dashboard_city_create', 'uses' => 'CitiesController@cityCreate']);
Route::get('admin/city-edit/{id}', ['as' => 'dashboard_city_edit', 'uses' => 'CitiesController@cityEdit' ]);
Route::put('admin/city-update/{id}', ['as' => 'dashboard_city_update', 'uses'=> 'CitiesController@updateCity']);



Route::get('admin/godfathers', ['as' => 'dashboard_godfathers', 'uses' => 'Admin\GodfathersController@index']);

Route::get('positions', ['as' => 'dashboard_positions', 'uses' => 'Admin\PositionsController@index']);

Route::get('zones', ['as' => 'zones', 'uses' => 'ZonesController@index']);
Route::post('zone-create', ['as' => 'zone_create', 'uses' => 'ZonesController@zoneCreate']);
Route::get('zone-edit/{id}', ['as' => 'zone_edit', 'uses' => 'ZonesController@zoneEdit' ]);
Route::put('zone-edit/{id}', ['as' => 'zone_update', 'uses'=> 'ZonesController@updateZone']);
Route::get('zone-delete/{id}', ['as' => 'zone_delete', 'uses'=> 'ZonesController@zoneDelete']);


Route::get('employees', ['as' => 'employees', 'uses' => 'EmployeesController@index']);
Route::get('employee-create',['as' => 'employee_create', 'uses' => 'EmployeesController@employeeCreate']);
Route::post('employee-store', ['as' => 'employee_store', 'uses' => 'EmployeesController@employeeStore']);
Route::get('employee-edit/{id}', ['as' => 'employee_edit', 'uses' => 'EmployeesController@employeeEdit']);
Route::put('employee-update/{id}',['as' => 'employee_update', 'uses' => 'EmployeesController@employeeUpdate']);
Route::get('employee-show/{id}', ['as' => 'employee_show', 'uses' => 'EmployeesController@employeeShow']);


Route::get('promoters',['as' => 'promoters', 'uses' => 'PromoterController@index']);
Route::get('promoter-create', ['as' => 'create_promoter', 'uses' => 'PromoterController@create']);
Route::post('promoter/create', ['as' => 'promoter_create', 'uses' => 'PromoterController@promoterCreate']);
Route::get('promoter-edit/{id}', ['as' => 'promoter_edit', 'uses' => 'PromoterController@promoterEdit']);
Route::put('promoter-update/{id}', ['as' => 'promoter_update', 'uses' => 'PromoterController@promoterUpdate']);
Route::get('promoter-show/{id}', ['as' => 'promoter_show', 'uses' => 'PromoterController@promoterShow']);


Route::get('advisers', ['as' => 'advisers', 'uses' => 'AdviserController@index']);
Route::get('adviser-create', ['as' => 'adviser_create', 'uses' => 'AdviserController@adviserCreate']);
Route::post('adviser-create', ['as' => 'adviser_store', 'uses' => 'AdviserController@createAdviser']);
Route::get('adviser-edit/{id}', ['as' => 'adviser_edit', 'uses' => 'AdviserController@adviserEdit']);
Route::put('adviser-update/{id}', ['as' => 'adviser_update', 'uses' => 'AdviserController@adviserUpdate']);
Route::get('adviser-show/{id}', ['as' => 'adviser_show', 'uses' => 'AdviserController@adviserShow']);


Route::get('postmens', ['as' => 'postmens', 'uses' => 'PostmenController@index']);
Route::get('postmen-create', ['as' => 'postmen_create', 'uses' => 'PostmenController@postmenCreate']);
Route::post('postmen-create', ['as' => 'postmen_store', 'uses' => 'PostmenController@postmenStore']);
Route::get('postmen-edit/{id}', ['as' => 'postmen_edit', 'uses' => 'PostmenController@postmenEdit']);
Route::put('postmen-update/{id}', ['as' => 'postmen_update', 'uses' => 'PostmenController@postmenUpdate']);
Route::get('postmen-show/{id}', ['as' => 'postmen_show', 'uses' => 'PostmenController@postmenShow']);


Route::get('datafamilies', ['as' => 'datafamilies', 'uses' => 'DatafamilyController@index']);
Route::get('datadamily-create', ['as' => 'datafamily_create', 'uses' => 'DatafamilyController@datafamilyStore']);
Route::post('datafamili-create', ['as' => 'datafamily_store', 'uses' => 'DatafamilyController@datafamilyCreate']);
Route::get('datafamilies-edit/{id}', ['as' => 'datafamily_edit', 'uses' => 'DatafamilyController@datafamilyEdit']);
Route::put('datafamily-update/{id}', ['as' => 'datafamily_update', 'uses' => 'DatafamilyController@datafamilyUpdate']);


Route::get('godchildrens', ['as' => 'godchildrens', 'uses' => 'GodchildrenController@index']);
Route::get('godchildren-create', ['as' => 'godchildren_create', 'uses' => 'GodchildrenController@godchildrenCreate']);
Route::post('godchildren-create', ['as' => 'godchildren_store', 'uses' => 'GodchildrenController@godchildrenStore']);
Route::get('godchildren-edit/{id}', ['as' => 'godchildren_edit', 'uses' => 'GodchildrenController@godchildrenEdit']);
Route::put('godchildren-update/{id}', ['as' => 'godchildren_update', 'uses' => 'GodchildrenController@godchildrenUpdate']);
Route::get('godchildren-show/{id}', ['as' => 'godchildren_show', 'uses' => 'GodchildrenController@godchildrenShow']);



Route::get('godfathers', ['as' => 'godfathers', 'uses' => 'GodfatherController@index']);
Route::get('godfathers-create',['as' => 'godfather_create', 'uses' => 'GodfatherController@godfatherCreate']);
Route::post('godfather-create', ['as' => 'godfather_store' ,'uses' => 'GodfatherController@godfatherStore']);
Route::get('godfather-edit/{id}', ['as' => 'godfather_edit', 'uses' => 'GodfatherController@godfatherEdit']);
Route::put('godfather-update/{id}', ['as' => 'godfather_update', 'uses' => 'GodfatherController@godfatherUpdate']);
Route::get('godfather-show/{id}', ['as' => 'godfather_show', 'uses' => 'GodfatherController@godfatherShow']);

//rutas para todo sobre cartera


Route::get('list-collections', ['as' => 'list_collections','uses' => 'Account\PostmenportfolioController@index']);
Route::get('assign-collection', ['as' => 'assign_collection','uses' => 'Account\PostmenportfolioController@PostmenportfolioCreate']);
Route::get('edit-collection/{id}', ['as' => 'edit_collection','uses' => 'Account\PostmenportfolioController@PostmenportfolioEdit']);
Route::put('postmentportfolio-update/{id}', ['as' => 'postmentportfolio_update', 'uses' => 'Account\PostmenportfolioController@PostmenportfolioUpdate']);

});


