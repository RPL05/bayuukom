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

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::resource('users', 'UserController');

Route::group(['prefix' => 'laporan'], function(){
});

route::post('/send-email', 'HomeController@sendEmail')->name('send.email');

Route::group(['prefix' => 'cekBarang'], function(){
    route::get('index','cekBarangController@index')->name('cekbarang.index');
    route::get('create','cekBarangController@create')->name('cekbarang.create');
});

Route::group(['prefix' => 'barang'], function(){
    route::get('index','BarangController@index')->name('barang.index');
    route::get('dashboard','BarangController@dashboard')->name('barang.dashboard');
    route::get('create','BarangController@create')->name('barang.create');
    route::post('store','BarangController@store')->name('barang.store');
    route::get('edit/{barang}','BarangController@edit')->name('barang.edit');
    route::put('update/{barang}','BarangController@update')->name('barang.update');
    route::get('cetak/{tglawal}/{tglakhir}','LaporanController@cetakLaporan')->name('barang.cetak');
});


Route::group(['prefix' => 'suplier'], function(){
    route::get('index','SuplierController@index')->name('suplier.index');
    route::get('create','SuplierController@create')->name('suplier.create');
    route::post('store','SuplierController@store')->name('suplier.store');
    route::get('cetak/{tglawal}/{tglakhir}','SuplierController@cetakLaporan')->name('suplier.cetak');
});

Route::group(['prefix' => 'request'], function(){
    route::get('index','RequestController@index')->name('request.index');
    route::get('accept','RequestController@accept')->name('request.accept');
    route::get('riject','RequestController@riject')->name('request.riject');
    route::get('indexcek','CekbarangController@index')->name('request.cekbarang.indexcek');
    route::get('createcek/{id}','CekbarangController@create')->name('request.cekbarang.createcek');
    route::post('store/{id}','RequestController@store')->name('request.store');
});
