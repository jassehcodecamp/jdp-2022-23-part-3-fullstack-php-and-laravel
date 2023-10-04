<?php

use App\Models\Todo;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use Illuminate\Http\Request;

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
    return view('auth.login');
});

Route::get('/dashboard', function (Request $request) {

    if ($request->query('status') == 'deleted') {
        $todos = Todo::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
    } else {
        // $todos = Todo::orderBy('created_at', 'desc')->get();
        $todos = Todo::latest()->get();
    }

    return view('dashboard', [
        'status' => $request->query('status') ?? 'Active',
        'todos' => $todos,
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('/todos')->middleware(['auth'])->name('todos.')->controller(TodosController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{todoId}', 'edit')->name('edit');
    Route::patch('/{todoId}', 'update')->name('update');
    Route::delete('/{todoId}', 'destroy')->name('delete');
    Route::patch('/{todo}/restore', 'restore')->name('restore');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
