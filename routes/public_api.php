<?php

Route::get('users', 'Api\PublicApi\UserController@index');
Route::get('users_latest', 'Api\PublicApi\UserController@getLatest');
Route::resource('usergroups', 'Api\PublicApi\UsergroupController');
