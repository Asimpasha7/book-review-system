<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterController;

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
//     return view('welcome');
// });


Route::get('/', [BookController::class, 'homepage'])->name('homepage');

Route::get('/homepage', [BookController::class, 'homepage'])->name('homepage');

Route::get('/', [BookController::class, 'index'])->name('index');

Route::get('/index-book', [BookController::class, 'index'])->name('index.book');

Route::get('/index-review', [ReviewController::class, 'index'])->name('index.review');



Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.destroy');
Route::put('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');


Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
Route::put('/review/update/{id}', [ReviewController::class, 'update'])->name('review.update');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
