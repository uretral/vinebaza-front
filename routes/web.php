<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', fn() => view('index'))->name('home');
Route::get('/wines', fn() => view('catalog'))->name('catalog');
Route::get('/wines', fn() => view('catalog'))->name('catalog');

/*[
    'as' => 'home', 'uses' => '\App\Http\Controllers\Index\IndexController@index'
]*/
