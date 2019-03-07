<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/dynasty','DynastyController');
    $router->resource('/country','CountryController');
    $router->resource('/incident','IncidentController');
    $router->resource('/personage','PersonageController');
    $router->resource('/religion','ReligionController');
    $router->resource('/work','WorkController');
});

Route::group([
    'prefix'        => '/admin/api',
    'namespace'     => 'App\\Admin\\Controllers\\Api',
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('data/dynasty','DataController@dynasty');
    $router->get('data/country','DataController@country');
    $router->get('data/adminUser','DataController@adminUser');
});