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

Route::get('/beranda', 'HomeController@index')->name('beranda');
Auth::routes();
Route::resource('users', 'UserController');

Route::group(['prefix' => 'masterbiaya'], function(){
    Route::get('index','MasterbiayaController@index')->name('masterbiaya.index');
    Route::get('create','MasterbiayaController@create')->name('masterbiaya.create');
    Route::post('store','MasterbiayaController@store')->name('masterbiaya.store');
    Route::get('edit/{masterbiaya}','MasterbiayaController@edit')->name('masterbiaya.edit');
    Route::put('update/{masterbiaya}','MasterbiayaController@update')->name('masterbiaya.update');
    Route::delete('delete/{masterbiaya}','MasterbiayaController@destroy')->name('masterbiaya.delete');
});

Route::group(['prefix' => 'transaksi'], function(){
    Route::get('index','TransaksiController@index')->name('transaksi.index');
    Route::get('create','TransaksiController@create')->name('transaksi.create');
    Route::post('store','TransaksiController@store')->name('transaksi.store');
    Route::get('edit/{transaksi}','TransaksiController@edit')->name('transaksi.edit');
    Route::put('update/{transaksi}','TransaksiController@update')->name('transaksi.update');
    Route::delete('delete/{transaksi}','TransaksiController@destroy')->name('transaksi.delete');
});

Route::group(['prefix' => 'laporan'], function(){
    route::get('index','LaporanController@index')->name('laporan.index');
    route::get('cetak/{tglawal}/{tglakhir}','LaporanController@cetakLaporan')->name('laporan.cetak');
});


Route::group(['prefix' => 'rekap'], function(){
    route::get('note/{transaksi}', 'TransaksiController@note')->name('transaksi.rekap');

});

