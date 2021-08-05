<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
	Auth::logout();
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/riwayat', 'HomeController@riwayat')->name('riwayat');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/map/petabanjir', 'Admin\VisualisasiMapController@get_petabanjir');
// Route::get('/admin/map/rawanbanjir', 'Admin\VisualisasiMapController@get_rawanbanjir')->name('map.rawanbanjir');


Route::resource('/admin/districts', 'Admin\DistrictsController', ['as' => 'admin']);
Route::resource('/admin/villages', 'Admin\VillagesController', ['as' => 'admin']);
Route::resource('/admin/populations', 'Admin\PopulationsController', ['as' => 'admin']);
Route::resource('/admin/landheights', 'Admin\LandheightsController', ['as' => 'admin']);
Route::resource('/admin/histories', 'Admin\HistoriesController', ['as' => 'admin']);
Route::resource('/admin/reservoirs', 'Admin\ReservoirsController', ['as' => 'admin']);
Route::resource('/admin/procedures', 'Admin\ProceduresController', ['as' => 'admin']);
Route::resource('/admin/rivers', 'Admin\RiversController', ['as' => 'admin']);
Route::resource('/admin/weathers', 'Admin\WeathersController', ['as' => 'admin']);


Route::get('/histori', 'Admin\HistoriesController@history_map')->name('histoty_map');;
Route::get('/ahp', 'Admin\AhpController@perhitunganAHP')->name('ahp');;
Route::get('/fahp', 'Admin\FAhpController@fahp')->name('fahp');
Route::get('/get_json_fahp', 'Admin\FAhpController@get_json')->name('get_json_fahp');
Route::get('/detail_procedure', 'ProcedureAPIController@index')->name('detail_procedure');

