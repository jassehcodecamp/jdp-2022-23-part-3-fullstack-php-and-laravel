<?php

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

    $todos = getTodos();

    return view('welcome', ['todos' => $todos]);
})->name('home');

Route::get('/create-todo', function () {
    return view('create-todo');
});

Route::post('/store-todo', function (Request $request) {

    $newTodo = [
        'id' => uniqid(),
        'description' => $request->description,
        'completed' => false
    ];

    storeTodo($newTodo);

    return redirect()->route('home');
})->name('store-todo');


function getTodos()
{

    $todoDB = "../todos.json";

    $todos = file_get_contents($todoDB);

    $todos = json_decode($todos, true);

    return $todos;

}

function storeTodo($todo)
{
    $todos = getTodos();

    array_unshift($todos, $todo);

    file_put_contents('../todos.json', json_encode($todos));

}
