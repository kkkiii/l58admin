<?php
Route::get('/home', 'Admin\IndexController@home');
Route::get('/', 'Admin\LoginController@login');
Route::get('/login', 'Admin\LoginController@login')->name('login');
Route::get('/logout', 'Admin\LoginController@logout')->name('logout');
Route::post('login/store', 'Admin\LoginController@store')->name('login.store');



