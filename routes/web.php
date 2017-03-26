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
Route::get('/auth/github', 'Auth\SocialController@redirectToGithub');
Route::get('/auth/github/callback', 'Auth\SocialController@handleGithubCallback');

Route::get('/roadmap', 'Site\RoadmapController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/test', function () {
    dd(auth()->user());
});

Route::get('/@{username}', 'Users\UserProfileController@showProfile');
Route::impersonate();
