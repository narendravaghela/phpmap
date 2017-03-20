<?php

Route::get('users', 'Api\PublicApi\UserController@index');
Route::resource('usergroups', 'Api\PublicApi\UsergroupController');
