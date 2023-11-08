<?php

include "./TodoDb.php";
include "./functions.php";

$todo = $_POST['todo'];

if ($todo) {
    $todoData = [
        'todo' => $todo,
    ];

    $todoDb = new TodoDb();

    $todoDb->storeTodo([$todo]);

    redirect('/');
} else {
    echo "Please add a todo";
}
