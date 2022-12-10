<?php

use App\Http\Controllers\ArticleController;

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
// Route::get('/approval', function () {
//     return view('approval/approval');
// });

Auth::routes();

Route::resource('articles', 'ArticleController');

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/reviewall/{book}',[ArticleController::class, 'show'])->name('reviewall');
// Route::resource('articles', 'ArticleController');
