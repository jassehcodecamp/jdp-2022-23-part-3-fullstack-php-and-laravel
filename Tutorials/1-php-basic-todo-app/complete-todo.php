<?php

include "./functions.php";

$todoId = $_POST['_id'];
$completed = $_POST['completed'];

$todoToUpdate = getTodo($todoId);

if (!$todoToUpdate) {
    redirect('/');
}

$todosArray = getTodos();

if ($completed == 'on') {

    $todoToUpdate['completed'] = true;

} else {
    $todoToUpdate['completed'] = false;
}


$todoToUpdateKey = "";
foreach($todosArray as $index => $todoArray) {
    if ($todoArray['id'] === $todoId) {
        $todoToUpdateKey = $index;
        break;
    }
}

$todosArray[$todoToUpdateKey] = $todoToUpdate;

file_put_contents('./todos.json', json_encode($todosArray));

redirect('/');
