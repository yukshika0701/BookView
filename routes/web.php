<?php

use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/admin', function () {
//     return view('admin/admin');
// });
// // Route::get('/auth', function () {
// //     return view('auth/login');
// // });
// Route::get('/review', function () {
//     return view('review/reviewall');
// });
// Route::get('/search', function () {
//     return view('search/search');
// });
// Route::get('/contribution', function () {
//     return view('contribution/contribution');
// });
// Route::get('/complete', function () {
//     return view('complete');
// });
// Route::get('/pastreview', function () {
//     return view('pastreview/pastreview');
// });
// Route::get('/edit', function () {
//     return view('edit/editreview');
// });
// Route::get('/editcomplete', function () {
//     return view('editcomplete');
// });
// Route::get('/delete', function () {
//     return view('delete/delete');
// });
// Route::get('/nice', function () {
//     return view('nice/nice');
// });
// Route::get('/application', function () {
//     return view('application/application');
// });

Auth::routes();
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');


Route::group(['middleware' => 'auth'], function() {

    Route::resource('books', 'BookController');
    
    
    Route::get('/', [BookController::class, 'index']);
    // Route::get('/show/{book}',[ArticleController::class, 'show'])->name('show');
    // Route::get('/create/{book}',[ArticleController::class, 'create'])->name('create');
    // Route::get('/store/{book}',[ArticleController::class, 'store'])->name('store');
    // Route::get('/past/{book}',[ArticleController::class, 'past'])->name('past');
// Route::get('/edit/{book}',[ArticleController::class, 'edit'])->name('edit');
// Route::resource('articles', 'ArticleController');

    Route::get('past', function () {
        return view('book/past');
    });

    
});
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
