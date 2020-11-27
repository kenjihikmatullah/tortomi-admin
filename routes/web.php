<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\TurtleTypeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

	// Auth
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::resource('articles', ArticleController::class)->except(['show']);
	Route::resource('turtle-types', TurtleTypeController::class)->except(['show']);

	// CKEditor
	Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

	// Profile
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

	// Others
	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
	Route::get('map', function () {
		return view('pages.maps');
	})->name('map');
	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');
	Route::get('table-list', function () {
		return view('pages.tables');
	})->name('table');
});
