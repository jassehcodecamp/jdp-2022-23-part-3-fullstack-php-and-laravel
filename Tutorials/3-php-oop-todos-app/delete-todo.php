<?php

include './TodoDb.php';
include "./functions.php";

$todoId = $_GET['id'];

$todoDb = new TodoDb();
$todoToDelete = $todoDb->getTodo($todoId);

if (!$todoToDelete) {
    redirect('/');
}

$todoDb->deleteTodo($todoId);

redirect('/');
