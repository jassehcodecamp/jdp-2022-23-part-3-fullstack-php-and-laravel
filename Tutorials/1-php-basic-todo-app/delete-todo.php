<?php

include "./functions.php";

$todoId = $_GET['id'];

$todoToDelete = getTodo($todoId);

if (!$todoToDelete) {
    redirect('/');
}

$todosArray = getTodos();


/*
$todoToDeleteKey = "";
foreach($todosArray as $index => $todoArray) {
    if ($todoArray['id'] === $todoId) {
        $todoToDeleteKey = $index;
        break;
    }
}

// delete the todo with the index $todoToDeleteKey
// unset($todosArray[$todoToDeleteKey]);
array_splice($todosArray, $todoToDeleteKey, 1);

*/

// $filteredTodosArray = array_filter($todosArray, function ($todo) use ($todoId) {
//     if ($todo['id'] != $todoId) {
//         return true;
//     } else {
//         return false;
//     }
// });

$filteredTodosArray = array_filter($todosArray, fn ($todo) => $todo['id'] != $todoId);

file_put_contents('./todos.json', json_encode($filteredTodosArray));

redirect('/');
