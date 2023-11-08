<?php

include './TodoDb.php';
include "./functions.php";

$todoId = $_POST['_id'];
$todo = $_POST['todo'];

$todoDb = new TodoDb();
$todoToUpdate = $todoDb->getTodo($todoId);


if (!$todoToUpdate) {
    redirect('/');
}


if ($todo) {
    $todoDb->updateTodo($todo, $todoId);
    redirect('/');
} else {
    echo "Please add a todo";
}
