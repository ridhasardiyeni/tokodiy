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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(
	['middleware' => ['auth']],function()
{
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/history-detail', 'HistoryController@show');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('kategori','KategoriController');
Route::resource('unit','UnitController');
Route::resource('suplier','SuplierController');
Route::resource('point','PointController');
Route::resource('produk','ProdukController');
Route::resource('order','OrderController');
Route::resource('media','MediaController');
Route::resource('keranjang','KeranjangController');
Route::resource('history','HistoryController');
Route::resource('pengiriman','PengirimanController');
Route::resource('jasapengiriman','JasaPengirimanController');

Route::get('kategori-cari','KategoriController@cari');
Route::get('produk-cari','ProdukController@cari');
Route::get('unit-cari','UnitController@cari');
Route::get('suplier-cari','SuplierController@cari');
Route::get('point-cari','PointController@cari');
Route::get('order-cari','OrderController@cari');
Route::get('history-cari','HistoryController@cari');
Route::get('jasapengiriman-cari','JasaPengirimanController@cari');
});