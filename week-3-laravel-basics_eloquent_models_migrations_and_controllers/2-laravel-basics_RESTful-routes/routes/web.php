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

Route::get('/todos', [TodosController::class, 'index'])->name('todos.index');

Route::get('/todos/create', function () {
    return view('todos.create', [
        'todos' => Todo::latest()->get()
    ]);
})->name('todos.create');

Route::get('/todos/{todoId}', function ($todoId) {
    $todo = Todo::find($todoId);
    return view('todos.edit', [
        'todo' => $todo
    ]);

})->name('todos.edit');

Route::patch('/todos/{todoId}', function ($todoId, Request $request) {
    $todo = Todo::find($todoId);

    $todo->description = $request->description;
    // $todo->description = $request->input('description');
    $todo->save();

    return redirect()->route('todos.index');

})->name('todos.update');


Route::delete('/todos/{todo}', function ($todo) {

    $todo = Todo::where('id', $todo)->delete();   // $todo = Todo::find($todo);

    return  redirect()->back();
})->name('todos.delete');

Route::patch('/todos/{todo}/restore', function ($todo) {

    $todo = Todo::where('id', $todo)->restore();
    // $todo = Todo::onlyTrashed()->find($todo)->restore();

    return  redirect()->route('todos.index');
})->name('todos.restore');

Route::post('/todos', function (Request $request) {

    $todo = new Todo();
    $todo->description =  $request->description;
    $todo->save();

    return  redirect()->back();

})->name('todos.store');
