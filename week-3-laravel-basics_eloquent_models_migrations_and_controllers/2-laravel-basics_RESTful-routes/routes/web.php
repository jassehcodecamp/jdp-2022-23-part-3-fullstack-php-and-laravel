<?php

use App\Http\Controllers\TodosController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
})->name('home');

Route::prefix('/todos')->name('todos.')->group(function () {

    Route::get('/', [TodosController::class, 'index'])->name('index');

    Route::get('/create', [TodosController::class, 'create'])->name('create');

    Route::get('/{todoId}', [TodosController::class, 'edit'])->name('edit');

    Route::patch('/{todoId}', [TodosController::class, 'update'])->name('update');

    Route::delete('/{todoId}', [TodosController::class, 'destroy'])->name('delete');

    Route::patch('/{todo}/restore', [TodosController::class, 'restore'])->name('restore');

    Route::post('', [TodosController::class, 'store'])->name('store');

});
