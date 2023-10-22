<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    // МЕНЮ
    $router->resource('/menu', \App\Admin\Controllers\Menu\MenuTopController::class);
    $router->resource('/menu_sub', \App\Admin\Controllers\Menu\MenuSubController::class);
    // ПАРСЕРЫ
    $router->resource('/parser/winestyle', \App\Admin\Controllers\Vue\ParserController::class);
    $router->resource('/parser/vivino', \App\Admin\Controllers\Vue\VivinoController::class);
    $router->resource('/parser/vivino_checker', \App\Admin\Controllers\Vue\VivinoCheckerController::class);
    $router->resource('/parser/json_parser', \App\Admin\Controllers\Vue\VivinoJsonController::class);
    // ДОНОРЫ
    $router->resource('/donors/links',\App\Admin\Controllers\Donors\DonorLinkController::class);
    $router->resource('/donors', \App\Admin\Controllers\Donors\DonorController::class);
    // КАТАЛОГ
    $router->resource('/catalog/categories',\App\Admin\Controllers\Catalog\CategoryController::class);
    // PRODUCT


    // PROPS
    $router->resource('/props/type',\App\Admin\Controllers\Props\PropTypeController::class);
    $router->resource('/props/color',\App\Admin\Controllers\Props\PropColorController::class);
    $router->resource('/props/sugar',\App\Admin\Controllers\Props\PropSugarController::class);
    $router->resource('/props/country',\App\Admin\Controllers\Props\PropCountriesController::class);
    $router->resource('/props/region',\App\Admin\Controllers\Props\PropRegionController::class);
    $router->resource('/props/manufacturer',\App\Admin\Controllers\Props\PropManufacturersController::class);
    $router->resource('/props/brand',\App\Admin\Controllers\Props\PropBrandController::class);
    $router->resource('/props/grape',\App\Admin\Controllers\Props\PropGrapeController::class);
    $router->resource('/props/pairing',\App\Admin\Controllers\Props\PropPairingController::class);
    $router->resource('/props/taste',\App\Admin\Controllers\Props\PropTasteController::class);


});
