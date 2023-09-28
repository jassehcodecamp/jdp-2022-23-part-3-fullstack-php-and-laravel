<?php

include "./functions.php";

$todoId = $_POST['_id'];
$todo = $_POST['todo'];

$todoToUpdate = getTodo($todoId);

if (!$todoToUpdate) {
    redirect('/');
}


if ($todo) {

    $todosArray = getTodos();

    $todoToUpdate['todo'] = $todo;

    $todoToUpdateKey = "";
    foreach($todosArray as $index => $todoArray) {
        if ($todoArray['id'] === $todoId) {
            $todoToUpdateKey = $index;
            break;
        }
    }

    // update todoToUpdate in todosArray
    $todosArray[$todoToUpdateKey] = $todoToUpdate;

    file_put_contents('./todos.json', json_encode($todosArray));

    redirect('/');
} else {
    echo "Please add a todo";
}
