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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/auth/github', 'Auth\SocialController@redirectToProvider');
Route::get('/auth/github/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/roadmap', 'Site\RoadmapController@index');

Route::get('/test', function() {
    $user = auth()->user();

    $amount = -200;
    $message = "The reason for this transaction";

    $data = [
        'ref_id' => 'someReferId',
    ];

    $transaction = $user->addPoints($amount, $message, $data);

    dd($transaction);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
