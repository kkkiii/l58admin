<?php
Route::get('/home', 'Admin\IndexController@home');
Route::get('/', 'Admin\LoginController@login');
Route::get('/login', 'Admin\LoginController@login')->name('login');
Route::get('/logout', 'Admin\LoginController@logout')->name('logout');
Route::post('login/store', 'Admin\LoginController@store')->name('login.store');


Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/priviledge.list', 'PriviledgeController@list')->name('priviledge.list');
    Route::get('/priviledge.roles', 'PriviledgeController@roles')->name('priviledge.roles');
    Route::get('/priviledge.edit_role/{id}', 'PriviledgeController@edit_role')->name('priviledge.edit_role');
    Route::post('/priviledge.edit_role_post', 'PriviledgeController@edit_role_post')->name('priviledge.edit_role_post');
    Route::get('/priviledge.del/{id}', 'PriviledgeController@del')->name('priviledge.del');

    Route::get('/consumer.list', 'ConsumerController@list');
    Route::get('/consumer.lock/{id}', 'ConsumerController@lock');
    Route::get('/consumer.del/{id}', 'ConsumerController@del');
});
