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

Route::get('/', 'Sites\SiteController@index');

Auth::routes();
Route::get('/auth/github', 'Auth\SocialController@redirectToProvider');
Route::get('/auth/github/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/roadmap', 'Site\RoadmapController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/test', function () {
    $url = 'https://php.ug/api/rest/listtype/1';
    $usergroups = json_decode(file_get_contents($url));

    foreach ($usergroups->groups as $usergroup) {
        echo $usergroup->name;
    }
});
