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

Route::group(['middleware' => 'auth'], function () {
	Route::resource('perusahaan', 'PerusahaanController');
	Route::resource('area', 'AreaController');
	Route::resource('lokasi', 'LokasiController');
	Route::resource('member', 'MembersController');
	Route::resource('pengaduan', 'PengaduanController');
	Route::get('/pengaduans/{pengaduans}/tangani',[
			'as' => 'pengaduan.tangani',
			'uses' => 'PengaduanController@tangani'
		]);
	Route::get('/lokasi/{id}/qrcode',[
			'as' => 'lokasi.qrcode',
			'uses' => 'QRCodeController@lokasi'
		]);
	Route::resource('penanganan', 'PenangananController');
	Route::get('/penanganans/{penanganans}/ajukan',[
			'as' => 'penanganan.ajukan',
			'uses' => 'PenangananController@ajukan'
		]);

	Route::resource('pengajuan', 'PengajuanController');
	Route::get('/pengajuans/{pengajuans}/terima',[
			'as' => 'pengajuan.terima',
			'uses' => 'PengajuanController@terima'
		]);

	Route::get('/pengajuans/{pengajuans}/tolak',[
			'as' => 'pengajuan.tolak',
			'uses' => 'PengajuanController@tolak'
		]);

	Route::resource('penyelesaian', 'PenyelesaianController');
	Route::post('/penyelesaians/stores',[
			'as' => 'penyelesaian.stores',
			'uses' => 'PenyelesaianController@stores'
		]);
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
