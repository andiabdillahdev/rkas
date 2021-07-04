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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// DASHBOARD DATA
Route::get('/dashboardDatas','HomeController@getData')->name('dashboard.data');
Route::get('/dashboardData','HomeController@sekolah')->name('sekolah.data');
Route::post('/dashboardData/update/{id}','HomeController@update')->name('updateSekolah.data');

Route::post('/logins', 'Auth\LoginController@logins')->name('logins_app');

Route::group(['prefix' => 'user'], function () {
    Route::get('kelola_user','kelolaUserController@index')->name('user.index');
    Route::get('data_staf','kelolaUserController@data_user_staff_table')->name('staff.data');
    Route::get('data_bendahara','kelolaUserController@data_user_bendahara')->name('bendahara.data');
    Route::get('data_kepsek','kelolaUserController@data_user_kepsek')->name('kepsek.data');
    // UPDATE
    Route::get('data_staf/update/{kode}','kelolaUserController@updatepasstaff')->name('staff.update');
    Route::post('data_staf/updateStore/{kode}','kelolaUserController@updateStorepasstaff')->name('staff.updateStore');
    Route::get('data_bendahara/edit/{kode}','kelolaUserController@editpasbendahara')->name('staff.bendahara');
    Route::post('data_bendahara/updateStore/{kode}','kelolaUserController@updateStorepasbendahara')->name('bendahara.updateStore');

    Route::get('data_kepsek/edit/{kode}','kelolaUserController@editpaskepsek')->name('staff.kepsek');
    Route::post('data_kepsek/updateStore/{kode}','kelolaUserController@updateStorepaskepsek')->name('kepsek.updateStore');
});



 // PEGAWAI
 Route::get('pegawai','pegawaiController@index')->name('staff.pegawai');
 Route::get('pegawai/create','pegawaiController@create')->name('staff.pegawai.create');
 Route::post('pegawai/store','pegawaiController@store')->name('staff.pegawai.store');
 Route::post('pegawai/update/{id}','pegawaiController@update')->name('staff.pegawai.update');
 Route::get('pegawai/getall','pegawaiController@getall')->name('staff.pegawai.getall');
 Route::get('pegawai/edit/{id}','pegawaiController@edit')->name('staff.pegawai.edit');
 Route::get('pegawai/show/{id}','pegawaiController@show')->name('staff.pegawai.show');
 Route::delete('pegawai/destroy/{kode}','pegawaiController@destroy')->name('staff.pegawai.destroy');
 Route::get('pegawai/dataGrafik','pegawaiController@dataGrafik')->name('staff.pegawai.dataGrafik');

//  Rekening
Route::get('rekening','rekeningController@index')->name('rekening');
Route::get('rekening/create','rekeningController@create')->name('rekening.create');
Route::post('rekening/store','rekeningController@store')->name('rekening.store');
Route::post('rekening/update/{id}','rekeningController@update')->name('rekening.update');
Route::get('rekening/edit/{id}','rekeningController@edit')->name('rekening.edit');
Route::delete('rekening/destroy/{kode}','rekeningController@destroy')->name('rekening.destroy');
Route::get('rekening/getall','rekeningController@getall')->name('rekening.getall');
//  SISWA
Route::get('siswa','siswaController@index')->name('staff.siswa');
Route::get('siswa/create','siswaController@create')->name('staff.siswa.create');
Route::post('siswa/store','siswaController@store')->name('staff.siswa.store');
Route::post('siswa/update/{id}','siswaController@update')->name('staff.siswa.update');
Route::get('siswa/getall','siswaController@getall')->name('staff.siswa.getall');
Route::get('siswa/edit/{id}','siswaController@edit')->name('staff.siswa.edit');
Route::get('siswa/show/{id}','siswaController@show')->name('staff.siswa.show');
Route::delete('siswa/destroy/{id}','siswaController@destroy')->name('staff.siswa.destroy');
Route::get('siswa/dataGrafik','siswaController@dataGrafik')->name('staff.siswa.dataGrafik');

// PENERIMAAN
Route::get('rkas/penerimaan','penerimaanController@index')->name('rkas.penerimaan');
Route::get('rkas/penerimaan/create','penerimaanController@create')->name('rkas.penerimaan.create');
Route::post('rkas/penerimaan/store','penerimaanController@store')->name('rkas.penerimaan.store');
Route::get('rkas/penerimaan/getall','penerimaanController@getall')->name('rkas.penerimaan.getall');
Route::get('rkas/penerimaan/edit/{id}','penerimaanController@edit')->name('rkas.penerimaan.edit');
Route::post('rkas/penerimaan/update/{id}','penerimaanController@update')->name('rkas.penerimaan.update');
Route::get('rkas/penerimaan/rkasView','penerimaanController@rkasView')->name('rkas.penerimaan.rkasView');
Route::get('rkas/penerimaan/rkasDataGet','penerimaanController@rkasDataGet')->name('rkas.penerimaan.rkasDataGet');
Route::delete('rkas/penerimaan/delete/{id}','penerimaanController@delete')->name('rkas.penerimaan.delete');

// MAIN PROGRAM
Route::get('komponen_data/mainprogram', 'mainprogramController@index')->name('mainprogram');
Route::get('komponen_data/mainprogram/create', 'mainprogramController@create')->name('mainprogram.create');
Route::post('komponen_data/mainprogram/store', 'mainprogramController@store')->name('mainprogram.store');
Route::get('komponen_data/mainprogram/edit/{id}', 'mainprogramController@edit')->name('mainprogram.edit');
Route::post('komponen_data/mainprogram/update/{id}', 'mainprogramController@update')->name('mainprogram.update');
Route::delete('komponen_data/mainprogram/destroy/{id}', 'mainprogramController@destroy')->name('mainprogram.destroy');

Route::get('/mainprogram/getall','mainprogramController@getall')->name('mainprogram.getall');

// SUB PROGRAM
Route::get('komponen_data/subprogram', 'subprogramController@index')->name('subprogram');
Route::get('komponen_data/subprogram/create', 'subprogramController@create')->name('subprogram.create');
Route::post('komponen_data/subprogram/store', 'subprogramController@store')->name('subprogram.store');
Route::get('komponen_data/subprogram/edit/{id}', 'subprogramController@edit')->name('subprogram.edit');
Route::post('komponen_data/subprogram/update/{id}', 'subprogramController@update')->name('subprogram.update');
Route::delete('komponen_data/subprogram/destroy/{id}', 'subprogramController@destroy')->name('subprogram.destroy');
Route::get('/subprogram/getall','subprogramController@getall')->name('subprogram.getall');
Route::get('/subprogram/get_sub/{id}','subprogramController@get_sub')->name('subprogram.get_sub');
Route::get('/subprogram/get_kode/{id}','subprogramController@get_kode')->name('subprogram.get_kode');

// ITEM PROGRAM
Route::get('komponen_data/itemprogram', 'itemprogramController@index')->name('itemprogram');
Route::get('komponen_data/itemprogram/create', 'itemprogramController@create')->name('itemprogram.create');
Route::post('komponen_data/itemprogram/store', 'itemprogramController@store')->name('itemprogram.store');
Route::get('komponen_data/itemprogram/edit/{id}', 'itemprogramController@edit')->name('itemprogram.edit');
Route::post('komponen_data/itemprogram/update/{id}', 'itemprogramController@update')->name('itemprogram.update');
Route::delete('komponen_data/itemprogram/destroy/{id}', 'itemprogramController@destroy')->name('itemprogram.destroy');
Route::get('/itemprogram/getall','itemprogramController@getall')->name('itemprogram.getall');
Route::get('/itemprogram/get_sub/{id}','itemprogramController@get_item')->name('subprogram.get_item');
Route::get('/itemprogram/get_kode/{id}','itemprogramController@get_kode')->name('itemprogram.get_kode');

// BELANJA
Route::get('komponen_data/belanja', 'belanjaController@index')->name('belanja');
Route::get('komponen_data/belanja/create', 'belanjaController@create')->name('belanja.create');
Route::post('komponen_data/belanja/store', 'belanjaController@store')->name('belanja.store');
Route::get('komponen_data/belanja/edit/{id}', 'belanjaController@edit')->name('belanja.edit');
Route::get('komponen_data/belanja/show/{id}', 'belanjaController@show')->name('belanja.show');
Route::post('komponen_data/belanja/update/{id}', 'belanjaController@update')->name('belanja.update');
Route::delete('komponen_data/belanja/destroy/{id}', 'belanjaController@destroy')->name('belanja.destroy');
Route::get('/belanja/getall','belanjaController@getall')->name('belanja.getall');

// KELOLA DATA
Route::get('penggunaan_dana/kelola_data', 'kelolaDataController@index')->name('kelolaData');
Route::get('penggunaan_dana/kelola_data/item_di_tolak', 'kelolaDataController@item_di_tolak')->name('kelolaData.item_di_tolak');
Route::get('penggunaan_dana/kelola_data/item_terkirim', 'kelolaDataController@item_terkirim')->name('kelolaData.item_terkirim');
Route::get('penggunaan_dana/kelola_data/item_selesai', 'kelolaDataController@item_selesai')->name('kelolaData.item_selesai');

// LPJ
Route::get('lpj', 'lpjController@index')->name('index.lpj');
Route::get('lpj/preview', 'lpjController@preview')->name('preview.lpj');
Route::post('lpj/submitToKepsek','lpjController@submitToKepsek')->name('lpj.submitToKepsek');


// BENDAHARA GUARD
Route::get('bendahara/panel', 'bendaharaHomeController@index')->name('bendahara.home');
Route::get('bendahara/panel/anggaran', 'bendaharaHomeController@anggaran')->name('bendahara.anggaran');
Route::get('bendahara/panel/belanjabyproses', 'bendaharaHomeController@belanjabyproses')->name('bendahara.belanjabyproses');
Route::get('bendahara/panel/belanjabytolak', 'bendaharaHomeController@belanjabytolak')->name('bendahara.belanjabytolak');
Route::get('bendahara/panel/belanjabyterima', 'bendaharaHomeController@belanjabyterima')->name('bendahara.belanjabyterima');
Route::post('bendahara/panel/update_status', 'bendaharaHomeController@update_status')->name('bendahara.update_status');
Route::get('bendahara/panel/lihat_data/{id}', 'bendaharaHomeController@lihat_data')->name('bendahara.lihat_data');
Route::get('bendahara/panel/getData', 'bendaharaHomeController@getData')->name('bendahara.getData');
Route::get('bendahara/panel/sekolah','bendaharaHomeController@sekolah')->name('bendahara.sekolah');
Route::get('bendahara/panel/pegawai','bendaharaHomeController@pegawai')->name('bendahara.pegawai');
Route::get('bendahara/panel/siswa','bendaharaHomeController@siswa')->name('bendahara.siswa');

// KEPSEK GUARD
Route::get('kepalasekolah/panel','kepsekController@index')->name('kepsek.home');
Route::get('kepalasekolah/sekolah','kepsekController@sekolah')->name('kepsek.sekolah');
Route::get('kepalasekolah/pegawai','kepsekController@pegawai')->name('kepsek.pegawai');
Route::get('kepalasekolah/siswa','kepsekController@siswa')->name('kepsek.siswa');
Route::get('kepalasekolah/getData','kepsekController@getData')->name('kepsek.getData');
Route::get('kepalasekolah/lpj','kepsekController@lpj')->name('kepsek.lpj');
Route::post('kepalasekolah/submitToBendahara','kepsekController@submitToBendahara')->name('kepsek.submitToBendahara');

// KAS UMUM
Route::get('bendahara/kas-umum', 'kasUmumController@index')->name('kasUmum.home');
Route::get('bendahara/kas-umum/create', 'kasUmumController@create')->name('kasUmum.create');
Route::get('bendahara/kas-umum/edit/{id}', 'kasUmumController@edit')->name('kasUmum.edit');
Route::post('bendahara/kas-umum/store', 'kasUmumController@store')->name('kasUmum.store');
Route::post('bendahara/kas-umum/update/{id}', 'kasUmumController@update')->name('kasUmum.update');
Route::get('bendahara/kas-umum/pilihRkas', 'kasUmumController@pilihRkas')->name('kasUmum.pilihRkas');
Route::get('bendahara/kas-umum/getAll', 'kasUmumController@getAll')->name('kasUmum.getAll');
Route::delete('bendahara/kas-umum/delete/{id}', 'kasUmumController@delete')->name('kasUmum.delete');
Route::get('bendahara/kas-umum/konvertPDF', 'kasUmumController@konvertPDF')->name('kasUmum.konvertPDF');

// BUKU PEMBANTU BANK
Route::get('bendahara/buku-pembantu-bank', 'bukuPembantuBankController@index')->name('pmbBank.home');
Route::get('bendahara/buku-pembantu-bank/create', 'bukuPembantuBankController@create')->name('pmbBank.create');
Route::get('bendahara/buku-pembantu-bank/edit/{id}', 'bukuPembantuBankController@edit')->name('pmbBank.edit');
Route::post('bendahara/buku-pembantu-bank/store', 'bukuPembantuBankController@store')->name('pmbBank.store');
Route::post('bendahara/buku-pembantu-bank/update/{id}', 'bukuPembantuBankController@update')->name('pmbBank.update');
Route::get('bendahara/buku-pembantu-bank/getAll', 'bukuPembantuBankController@getAll')->name('pmbBank.getAll');
Route::delete('bendahara/buku-pembantu-bank/delete/{id}', 'bukuPembantuBankController@delete')->name('pmbBank.delete');
Route::get('bendahara/buku-pembantu-bank/konvertPDF', 'bukuPembantuBankController@konvertPDF')->name('pmbBank.konvertPDF');

// BUKU PEMBANTU PAJAK
Route::get('bendahara/buku-pembantu-pajak', 'bukuPembantuPajakController@index')->name('pmbPajak.home');
Route::get('bendahara/buku-pembantu-pajak/create', 'bukuPembantuPajakController@create')->name('pmbPajak.create');
Route::post('bendahara/buku-pembantu-pajak/store', 'bukuPembantuPajakController@store')->name('pmbPajak.store');
Route::get('bendahara/buku-pembantu-pajak/getAll', 'bukuPembantuPajakController@getAll')->name('pmbPajak.getAll');
Route::get('bendahara/buku-pembantu-pajak/edit/{id}', 'bukuPembantuPajakController@edit')->name('pmbPajak.edit');
Route::post('bendahara/buku-pembantu-pajak/update/{id}', 'bukuPembantuPajakController@update')->name('pmbPajak.update');
Route::delete('bendahara/buku-pembantu-pajak/delete/{id}', 'bukuPembantuPajakController@delete')->name('pmbPajak.delete');
Route::get('bendahara/buku-pembantu-pajak/konvertPDF', 'bukuPembantuPajakController@konvertPDF')->name('pmbPajak.konvertPDF');