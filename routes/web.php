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

//Route::get('/', function () {
//    return view('welcome');
//});

$router->get('test/t1','TestController@t1');
$router->get('test/t2','TestController@t2');
$router->get('test/t3','TestController@t3');
$router->get('test/t4','TestController@t4');
$router->get('test/t5','TestController@t5');
require __DIR__.'./admin.php';