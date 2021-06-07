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

