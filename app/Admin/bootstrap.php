<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);

$vueRoute = [];
$route = request()->getPathInfo();

switch (true):
    case  stristr($route,"/admin/parser/winestyle"):
        $vueRoute[] = '/js/parser.js';
        break;
    case  stristr($route,"/admin/parser/json_parser"):
        $vueRoute[] = '/js/vivino.json.js';
        break;
    case  stristr($route,"/admin/parser/vivino_checker"):
        $vueRoute[] = '/js/vivino.checker.js';
        break;
    case  stristr($route,"/admin/parser/vivino"):
        $vueRoute[] = '/js/vivino.js';
        break;

    default:

endswitch;

//\Encore\Admin\Facades\Admin::css([
//    '/vendor/laravel-admin/parser/css/heyui.css',
//    'vendor/laravel-admin/parser/css/app.css'
//]);
//\Encore\Admin\Facades\Admin::js($vueRoute);
