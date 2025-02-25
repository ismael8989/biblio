<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

Route::resource('book', BookController::class);

Route::get('/', function () {
    return view('main');
})->name('index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/list', function () {
    return view('list');
})->name('list');

Route::get('/details', function () {
    return view('details');
})->name('details');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::post('/signup', 'App\Http\Controllers\UserController@store');
Route::post('/login', 'App\Http\Controllers\UserController@login');
Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');

Route::get('/login', function () {
    return view('login');
})->name('login');

route::fallback(function () {
    return view('notfound');
}, 404);





// Routes protégées 
Route::middleware('auth')->group(function () { 
    Route::get('/books', [BookController::class, 'index'])->name('book.index');
});




Route::delete('/books/{id}/force-delete', [BookController::class, 'forceDelete'])->name('books.forceDelete');
Route::patch('/books/{id}/restore', [BookController::class, 'restore'])->name('books.restore');


Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::post('/profile', [UserController::class, 'update'])->name('profile.update');

Route::get('/edit', [UserController::class, 'edit'])->name('editp');