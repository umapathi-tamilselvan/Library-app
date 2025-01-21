<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BorrowerController;

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

Route::get('/home', [LibraryController::class, 'index'])->name('home');
Route::get('/books',[LibraryController::class,'book'])->name('books');
Route::get('/borrowers',[LibraryController::class,'borrower'])->name('borrowers');

Route::get('/book/add', [BookController::class, 'index'])->name('book');
Route::post('/book', [BookController::class, 'create'])->name('book');
Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.delete');

Route::get('/borrower/add', [BorrowerController::class, 'index'])->name('borrower');
Route::post('/borrower', [BorrowerController::class, 'create'])->name('borrower');
