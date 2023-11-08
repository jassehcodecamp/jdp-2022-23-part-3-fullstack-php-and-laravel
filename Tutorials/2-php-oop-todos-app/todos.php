<?php

include('./TodoDb.php');

$todoDb = new TodoDb();

$todos = $todoDb->getTodos();
