<?php

use Illuminate\Support\Facades\Route;
use App\Events\UpdateScore;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@index')->name('index');
Route::put('/update-score', 'HomeController@updateScore')->name('update-score');
Route::get('/broadcast', 'HomeController@broadcast')->name('broadcast-score');
/*Route::get('/broadcast', function() {
    broadcast(new UpdateScore());
});*/

//Auth::routes();

