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


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//admin route
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/data_user','AdminController@datauser')->name('datauser');
Route::resource('/kate','AdminController');
Route::get('/kategori','AdminController@kategori')->name('kategori');
Route::get('/katget','AdminController@katget')->name('katget');
Route::get('/subkategori','AdminController@subkategori')->name('subkategori');
Route::get('/kategori/edit/{id}','AdminController@cari')->name('editkat');
Route::post('/katpos','AdminController@kategoripost')->name('kategoripost');
Route::post('/kated','AdminController@kategoriedit')->name('kategoriedit');
Route::get('/kathap','AdminController@kategorihapus')->name('kategorihapus');
Route::post('/subpos','AdminController@subpost')->name('subpost');
Route::post('/subed','AdminController@subedit')->name('subedit');
Route::get('/subhap','AdminController@subhapus')->name('subhapus');
Route::get('/sub/edit/{id}','AdminController@carisub')->name('editsub');
Route::get('/produk','AdminController@produk')->name('produk');
Route::get('/produkget','AdminController@produkdetail')->name('produkget');

