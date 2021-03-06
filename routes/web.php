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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pencipta', PenciptaController::class)->middleware(['auth', 'role:admin,nonadmin']);
Route::resource('buku', BukuController::class)->middleware(['auth', 'role:admin,nonadmin']);