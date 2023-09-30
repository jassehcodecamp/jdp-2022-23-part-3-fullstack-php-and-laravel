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

Route::prefix('/todos')->name('todos.')->controller(TodosController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{todoId}', 'edit')->name('edit');
    Route::patch('/{todoId}', 'update')->name('update');
    Route::delete('/{todoId}', 'destroy')->name('delete');
    Route::patch('/{todo}/restore', 'restore')->name('restore');
});
