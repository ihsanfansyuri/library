<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

// Route::get('/book', [BookController::class, 'index'])->name('book.index');

// Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
// Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
// Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
// Route::put('/book/{id}/update', [BookController::class, 'update'])->name('book.update');
// Route::delete('/book/{id}/delete', [BookController::class, 'delete'])->name('book.delete');

Route::get('/register', [RegisController::class, 'index'])->name('regis.index');
Route::post('/register', [RegisController::class, 'store'])->name('regis.store');

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::name('book.')->middleware(['auth'])->prefix('book')->group(function () {
  Route::get('/', [BookController::class, 'index'])->name('index');
  Route::get('/create', [BookController::class, 'create'])->name('create')->middleware('admin');
  Route::post('/store', [BookController::class, 'store'])->name('store')->middleware('admin');
  Route::prefix('{id}')->middleware('admin')->group(function () {
    Route::get('/edit', [BookController::class, 'edit'])->name('edit');
    Route::put('/update', [BookController::class, 'update'])->name('update');
    Route::delete('/delete', [BookController::class, 'delete'])->name('delete');
  });
});
// Route::resource('book', BookController::class);
