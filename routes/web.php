<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('welcome');
//})->middleware(['auth.shopify'])->name('home');

 // Order Routes
 Route::get('/', 'OrdersController@getAllOrders')->middleware(['auth.shopify'])->name('home');
 Route::get('/show/form/{id}', 'OrdersController@showFormPage')->name('show.form')->middleware(['auth.shopify']);
 Route::get('/edit/form/{id}', 'OrdersController@showEditForm')->name('edit.form')->middleware(['auth.shopify']);
 Route::post('/form/submit/{id}', 'OrdersController@submit')->name('form.submit')->middleware(['auth.shopify']);
 Route::get('/direct/downlaod/{id}', 'OrdersController@directDownload')->name('direct.pdf')->middleware(['auth.shopify']);
 Route::get('/generate/pdf/{id}', 'OrdersController@generatePdf')->name('generate.pdf')->middleware(['auth.shopify']);
 Route::get('/orders/{id}', 'OrdersController@getSingleOrder')->middleware(['auth.shopify']);
 Route::get('/pdf', 'OrdersController@pdf')->middleware(['auth.shopify']);


Route::get('/store', 'OrdersController@storeOrders')->middleware(['auth.shopify']);

