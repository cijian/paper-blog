<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
//    'prefix'        => config('admin.route.prefix'),
    'domain'        => config('admin.route.domain'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

});
