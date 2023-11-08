<?php

use App\Models\Todo;
use Illuminate\Http\Request;
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
    $todos = Todo::get();
    return view('welcome', [
        'todos' => $todos,
    ]);
})->name('home');

Route::get('/create-todo', function () {
    $todos = Todo::get();

    return view('create-todo', compact('todos'));
});

Route::get('/edit-todo/{todoId}', function ($todoId) {
    $todo = Todo::find($todoId);
    return view('edit-todo', [
        'todo' => $todo
    ]);

})->name('edit-todo');

Route::patch('/update-todo/{todoId}', function ($todoId, Request $request) {
    $todo = Todo::find($todoId);

    $todo->description = $request->description;
    // $todo->description = $request->input('description');
    $todo->save();

    return redirect()->route('home');

})->name('update-todo');


Route::delete('/delete-todo/{todo}', function ($todo) {

    $todo = Todo::where('id', $todo)->delete();   // $todo = Todo::find($todo);

    return  redirect()->back();
})->name('delete-todo');

Route::post('/store-todo', function (Request $request) {

    $todo = new Todo();
    $todo->description =  $request->description;

    $todo->save();

    return  redirect()->back();

})->name('store-todo');
