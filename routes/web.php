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
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
	Route::resource('perusahaan', 'PerusahaanController');
	Route::resource('area', 'AreaController');
	Route::resource('lokasi', 'LokasiController');
	Route::get('/lokasis/{id}/generate/',[
			'as' => 'lokasi.generate',
			'uses' => 'LokasiController@generate'
		]);
	Route::resource('laporan', 'LaporanController');
	Route::get('/laporans/{laporans}/tangani',[
			'as' => 'laporan.tangani',
			'uses' => 'LaporanController@tangani'
		]);
	Route::resource('penanganan', 'PenangananController');
	Route::get('/penanganans/{penanganans}/ajukan',[
			'as' => 'penanganan.ajukan',
			'uses' => 'PenangananController@ajukan'
		]);

	Route::resource('pengajuan', 'PengajuanController');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
