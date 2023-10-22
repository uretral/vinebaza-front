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

Route::get('/', fn() => view('index'))->name('home');
Route::get('/wines', fn() => view('catalog'))->name('catalog');
Route::get('/wines/{slug}', [\App\Http\Controllers\ProductController::class,'index'] )->name('product');
Route::get('/countries', fn() => view('countries'))->name('countries');
Route::get('/countries/{slug}', fn() => view('country'))->name('country');
Route::get('/regions', fn() => view('regions'))->name('regions');
Route::get('/regions/{slug}', fn() => view('region'))->name('region');
Route::get('/sub-regions', fn() => view('sub-regions'))->name('sub-regions');
Route::get('/sub-regions/{slug}', fn() => view('sub-region'))->name('sub-region');
Route::get('/wineries', fn() => view('wineries'))->name('wineries');
Route::get('/wineries/{slug}', fn() => view('winery'))->name('winery');
Route::get('/brands', fn() => view('brands'))->name('brands');
Route::get('/brands/{slug}', fn() => view('brand'))->name('brand');
Route::get('/color', fn() => view('color'))->name('color');



Route::get('/ttt', [\App\Http\Controllers\_TestArea\CasperTestingController::class,'index'])->name('test');



Route::post('/parse/catcatcat',function (){
    $catalog = new \App\Services\Winstyle\CatalogController(
        request()->get('link'),
        request()->get('donor_id'),
        request()->get('category_id'),
        request()->get('proxy')
    );
    return json_encode($catalog,JSON_UNESCAPED_UNICODE || JSON_UNESCAPED_SLASHES) ;

});


Route::post('/parse/prodprodprod',function (){
    $product = new \App\Services\Winstyle\ItemController(
        request()->get('link'),
        request()->get('product_id'),
        request()->get('ses_id'));
    return json_encode($product,JSON_UNESCAPED_UNICODE || JSON_UNESCAPED_SLASHES) ;

});

Route::any('/vivino', '\App\Services\Vivino\VivinoVueController@async');
