<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::any('/update/{id}','UserController@update');
Route::any('/userbyid','UserController@usecrbyid');
Route::any('/updateuser/{id}','UserController@updateuser');



//kategori
Route::get('/kategori','KategoriController@kategori');
//produk
Route::get('/produk','ProdukController@produk');

Route::any('/addproduk','ProdukController@addproduk');
Route::any('/search','ProdukController@search');
Route::any('/bykategori','ProdukController@bykategori');
// Route::any('/bytoko','ProdukController@bytoko');
// Route::any('/bypoint','ProdukController@bypoint');
Route::any('/byunit','ProdukController@byunit');
Route::any('byuser','ProdukController@byuser');
// Route::any('/produk_image','ProdukController@produk_image');
Route::any('/addproduct','ProdukController@addproduct');
Route::any('/bypromed','ProdukController@bypromed');
// Route::any('/bymedia','ProdukController@bymedia');

//unit
Route::get('/unit','UnitController@unit'); 
//media
Route::get('/media','MediaController@media');
Route::post('/addmedia','MediaController@addmedia');
Route::any('/mediabyproduk','MediaController@mediabyproduk');
Route::any('/mediafile','MediaController@mediafile');
//point
Route::get('/point','PointController@point');
Route::any('/pointbytoko','PointController@pointbytoko');
Route::any('/pointbyproduk','PointController@pointbyproduk');
//pesan
Route::get('/pesan','PesanController@pesan');
Route::any('/pesanbyuser','PesanController@pesanbyuser');
//supplier
Route::get('/suplier','SuplierController@suplier');
//order
Route::get('/order','OrderController@order');
Route::get('/orderbyproduk','OrderController@orderbyproduk');
Route::any('/orderbysuplier','OrderController@orderbysuplier');
//toko
Route::get('/toko','TokoController@toko');
Route::any('/tokobypoint','TokoController@tokobypoint');
//penjualan
Route::get('/penjualan','PenjualanController@penjualan');
Route::any('/penjualanbyuser','PenjualanController@penjualanbyuser');
//detailpenjualan
Route::get('/detail_penjualan','DetailPenjualanController@detail_penjualan');
Route::any('/bypenjualan','DetailPenjualanController@bypenjualan');
Route::any('/byprodukdetail','DetailPenjualanController@byprodukdetail');
//pembelian
Route::get('/pembelian','PembelianController@pembelian');
Route::any('/pembelianbysuplier','PembelianController@pembelianbysuplier');
//detailpembelian
Route::get('/detail_pembelian','DetailPembelianController@detail_pembelian');
Route::any('/detailbyproduk','DetailPembelianController@detailbyproduk');
Route::any('/bypembelian','DetailPembelianController@bypembelian');

//keranjang
Route::any('/keranjangbyproduk','KeranjangController@keranjangbyproduk');
Route::any('/relasikeranjang','KeranjangController@relasikeranjang');
Route::any('/keranjang','KeranjangController@keranjang');
Route::any('/keranjangbyuser','KeranjangController@keranjangbyuser');
Route::any('/addkeranjang','KeranjangController@addkeranjang');
Route::delete('/keranjang/{id}','KeranjangController@delete');
Route::put('/updatestatus/{id}','KeranjangController@updatestatus');
Route::any('/tampilharga','KeranjangController@tampilharga');
Route::any('/updatejum/{id}','KeranjangController@updatejum');

//favorit
Route::any('/favorit','FavoritController@favorit');
Route::any('/relasifavorit','FavoritController@relasifavorit');
Route::any('/favoritbyuser','FavoritController@favoritbyuser');
Route::any('/favoritbyproduk','FavoritController@favoritbyproduk');
Route::any('/addfavorit','FavoritController@addfavorit');
Route::delete('/favorit/{id}','FavoritController@delete');

//Info
Route::any('/info','InfoController@info');
Route::any('/addinfo','InfoController@addinfo');

//About
Route::any('/about','AboutController@about');
Route::any('/addabout','AboutController@addabout');
Route::any('/updateabout/{id}','AboutController@updateabout');

//Detail User
Route::any('/detailuser','DetailUserController@detailuser');
Route::any('/detailbyuser','DetailUserController@detailbyuser');
Route::any('/adddetailuser','DetailUserController@adddetailuser');
Route::any('/updatedetail/{id_detailuser}','DetailUserController@updatedetail');

//
Route::any('/pembayaran','PembayaranController@pembayaran');
Route::any('/addpembayaran','PembayaranController@addpembayaran');

//history
Route::any('/history','HistoryController@history');
Route::any('/addhistory','HistoryController@addhistory');
Route::any('/delhistory/{id}','HistoryController@delhistory');
Route::any('/statushis/{id}','HistoryController@statushis');
Route::any('/historybyuser','HistoryController@historybyuser');
Route::any('/historybyproduk','HistoryController@historybyproduk');
Route::any('/checkout','HistoryController@checkout');
Route::any('/addcheckout','HistoryController@addcheckout');
Route::any('/byjasa','HistoryController@byjasa');

//pengiriman
Route::any('/pengiriman','PengirimanController@pengiriman');
Route::any('/addpengiriman','PengirimanController@addpengiriman');
Route::any('/delpengiriman/{id}','PengirimanController@delpengiriman');
Route::any('/editstatus/{id}','PengirimanController@editstatus');
Route::any('/updateresi/{id}','PengirimanController@updateresi');
Route::any('/bypembeli','PengirimanController@byuserpengirim');
Route::any('/bypenjual','PengirimanController@bypenjual');
Route::any('/bypembayaran','PembayaranController@bypembayaran');

//Jasa Pengiriman
Route::any('/jasapengiriman','JasaPengirimanController@jasapengiriman');
Route::any('/addjasa','JasaPengirimanController@addjasa');
Route::any('/updatejasa/{id}','JasaPengirimanController@updatejasa');
Route::any('/deljasa/{id}','JasaPengirimanController@deljasa');
