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

//Route Controller db_dash_kios
Route::get('/', 'db_dash_kios@index');
Route::get('/index', 'db_dash_kios@index');
Route::post('/login', 'db_dash_kios@lost')->name('login');
Route::get('/logout', 'db_dash_kios@logout');
Route::get('/chart','db_dash_kios@chart')->name('chart');
Route::get('/summary', 'db_dash_kios@summary')->name('summary');
Route::get('/sucluster', 'db_dash_kios@summarycluster')->name('sucluster');
Route::get('/summary_report', 'db_dash_kios@sum_report')->name('reportsum');
Route::get('/summary_report_bulk', 'db_dash_kios@sum_report_bulk')->name('reportsumbulk');
Route::get('/summary_report_perdana', 'db_dash_kios@sum_report_perdana')->name('reportsumperdana');
Route::get('/download/excel', 'db_dash_kios@export_excel')->name('downloadexcel');
Route::get('/transaksi/mkios', 'db_dash_kios@transaksi_mkios')->name('transmkios');

//Route Controller AwalPunya
Route::get('/report', 'AwalPunya@chart')->name('report');
Route::get('/reportmkios', 'AwalPunya@reportmkios')->name('reportmkios');
Route::get('/reportbulk', 'AwalPunya@reportbulk')->name('reportbulk');
Route::get('/reportpln', 'AwalPunya@reportpln')->name('reportpln');
Route::get('/cluster', 'AwalPunya@cluster')->name('cluster');
Route::get('/implementasi', 'AwalPunya@imp')->name('imp');
Route::get('/jumsmkios', 'AwalPunya@jumsmkios')->name('jumsmkios');
Route::get('/jumsbulk', 'AwalPunya@jumsbulk')->name('jumsbulk');
Route::get('/bluebirdharian','AwalPunya@bluebirdharian')->name('bluebirdharian');
Route::get('/takeoffbluebird','AwalPunya@takeoffbluebird')->name('takeoffbluebird');
Route::get('/excelbluebirdcutoff','AwalPunya@takeoffdownload')->name('takeoffdownload');

//API

Route::get('/emoneyapi/{id}','AwalPunya@emoneyapi')->name('emoneyapi');

?>
