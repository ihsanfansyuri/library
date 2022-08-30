<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Models\Book;
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

Route::name('book.')->prefix('book')->group(function () {
  Route::get('/', [BookController::class, 'index'])->name('index');
  Route::get('/create', [BookController::class, 'create'])->name('create');
  Route::post('/store', [BookController::class, 'store'])->name('store');
  Route::prefix('{id}')->group(function () {
    Route::get('/edit', [BookController::class, 'edit'])->name('edit');
    Route::put('/update', [BookController::class, 'update'])->name('update');
    Route::delete('/delete', [BookController::class, 'delete'])->name('delete');
  });
});
// Route::resource('book', BookController::class)->name('book');