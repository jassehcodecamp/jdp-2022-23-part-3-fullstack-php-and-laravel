<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowersController;
use App\Http\Controllers\BookRequestsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/authors')->middleware('auth')->name('authors.')->group(function () {
    Route::get('/', [AuthorsController::class, 'index'])->name('index');
    Route::get('/create', [AuthorsController::class, 'create'])->name('create');
    Route::post('/', [AuthorsController::class, 'store'])->name('store');
});

Route::prefix('/books')->middleware('auth')->name('books.')->group(function () {
    Route::get('/', [BooksController::class, 'index'])->name('index');
    Route::get('/create', [BooksController::class, 'create'])->name('create');
    Route::post('/', [BooksController::class, 'store'])->name('store');
});

Route::prefix('/borrowers')->middleware('auth')->name('borrowers.')->group(function () {
    Route::get('/', [BorrowersController::class, 'index'])->name('index');
    Route::get('/create', [BorrowersController::class, 'create'])->name('create');
    Route::post('/', [BorrowersController::class, 'store'])->name('store');
});

Route::prefix('/book-requests')->middleware('auth')->name('book-requests.')->group(function () {
    Route::get('/', [BookRequestsController::class, 'index'])->name('index');
    Route::get('/create', [BookRequestsController::class, 'create'])->name('create');
    Route::post('/', [BookRequestsController::class, 'store'])->name('store');
});

require __DIR__ . '/auth.php';
