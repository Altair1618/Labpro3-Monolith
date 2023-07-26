<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/catalog');
});

Route::group(['middleware' => ['validator'], 'namespace' => 'App\Http\Controllers'], function() {

    Route::get('/catalog', 'BarangController@showCatalog')->name('catalog');
    
    Route::get('/catalog/{id}', 'BarangController@showBarangDetail')->name('catalog.detail');
    
    Route::get('/buy/{id}', 'BarangController@showBarangBuyPage')->name('catalog.buy');
    
    Route::get('/history', 'RiwayatController@showRiwayat')->name('history');

    Route::post('/buy/{id}', 'BarangController@buyBarang')->name('catalog.buy.post');
    
});

Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Route::post('/login', 'AuthController@login')->name('auth.login');
    Route::post('/logout', 'AuthController@logout')->name('auth.logout');
    Route::post('/me', 'AuthController@me')->name('auth.me');

    Route::post('/register', 'UserController@register')->name('user.register');
});

Route::get('/register', function () {
    return view('register', [
        "title" => "Register"
    ]);
});

Route::get('/login', function () {
    return view('login', [
        "title" => "Login"
    ]);
})->name('login');


Route::get('/laravel', function () {
    return view('welcome');
});
