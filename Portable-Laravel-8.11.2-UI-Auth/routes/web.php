<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudsController;
use App\Http\Controllers\Controller;

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
    return view('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('contact', function () { return view('contact'); });
Route::post('contact', 'App\Http\Controllers\Controller@validateFormInfo'); 

Route::resource('crud',CrudsController::class);

Route::resource('articles', ArticleController::class);

Route::get('articles',[ArticleController::class,'index'])->name('articles.index');
Route::get('articles/create',[ArticleController::class,'create'])->name('articles.create');
Route::post('articles',[ArticleController::class,'store'])->name('articles.store');
Route::get('articles/{article}',[ArticleController::class,'show'])->name('articles.show');
Route::get('articles/{article}/edit',[ArticleController::class,'edit'])->name('articles.edit');
Route::put('articles/{article}',[ArticleController::class,'update'])->name('articles.update');
Route::delete('articles/{article}',[ArticleController::class,'destroy'])->name('articles.destroy');

Route::resource('users', UserController::class);

Route::get('users',[UserController::class,'index'])->name('users.index');
Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::post('users',[UserController::class,'store'])->name('users.store');
Route::get('users/{user}',[UserController::class,'show'])->name('users.show');
Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
Route::put('users/{user}',[UserController::class,'update'])->name('users.update');
Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');

Route::get('photogallery', 'App\Http\Controllers\PhotoGalleryController@index');
Route::post('photogallery', 'App\Http\Controllers\PhotoGalleryController@upload');
Route::delete('photogallery/{id}', 'App\Http\Controllers\PhotoGalleryController@destroy');

Route::group(['middleware' => 'auth2'], function () {     
    Route::get('user', function () { return view('user'); })->name("user");
    Route::resource('admin', UserController::class);
    Route::get('admin',[UserController::class,'index'])->name('admin.index');
    Route::get('settings', function () { return view('settings'); })->name("settings");
    Route::put('settings/{user}',[UserController::class,'update'])->name('settings.update');
    Route::get('contact-messages',[Controller::class,'showmessages']);
});