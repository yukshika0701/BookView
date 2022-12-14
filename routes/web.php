<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;


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


Auth::routes();
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function() {

    Route::resource('books', 'BookController',['only' => ['index', 'store', 'show', 'edit', 'update']]);
    Route::resource('reviews', 'ReviewController',['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    
    
    Route::get('/', [BookController::class, 'index']);
    Route::post('/ajaxnice', [BookController::class, 'ajaxnice']);
    Route::get('/past', [BookController::class, 'past'])->name('past');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/nicehistory', [ReviewController::class, 'nicehistory'])->name('nicehistory');
    Route::get('/store', [BookController::class, 'store'])->name('addbook');
    Route::get('/update/{book}', [BookController::class, 'update'])->name('form');
    
});


