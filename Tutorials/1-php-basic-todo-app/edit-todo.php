<?php
include './functions.php';

$todoId = $_GET['id'];

// fetch todo
$todo = getTodo($todoId);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Todo</title>
</head>
<body>
   <h1>PHP Basic Todos App</h1>

  <div>
    <h2>Edit Todo</h2>
    <form action="./update-todo.php" method="POST">
      <div>
        <input type="text" placeholder="Write your next task" name="todo" value="<?= $todo['todo'] ?>" >
        <input type="hidden" name="_id" value="<?= $todo['id'] ?>">
        <button>Submit</button>
      </div>
    </form>

    <a href="/">Home</a>
  </div>
</body>
</html>