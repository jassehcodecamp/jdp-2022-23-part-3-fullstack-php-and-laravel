<?php include "./todos.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1 - PHP Basic Todos App</title>
  <style>
    li {
      display: flex;
      column-gap: 0.75rem;
    }
    li  a:first-child {
      text-decoration: none;
      color: currentColor;
    }
    li + li {
      margin-block-start: 0.5rem;
    }
    .edit {
      color: dodgerblue;
    }

    .delete {
      color: rgb(200, 0, 0);
    }

    .line-through {
      text-decoration: line-through !important;
    }
  </style>
</head>
<body>
  <h1>PHP Basic Todos App</h1>

  <div>
    <h2>Create Todo</h2>
    <form action="./store-todo.php" method="POST">
      <div>
        <input type="text" placeholder="Write your next task" name="todo">
        <button>Submit</button>
      </div>
    </form>


    <div class="todos">
      <h2>My Todos</h2>
      <ul>
        <?php foreach($todos as $todo) { ?>
        <li>
          <form method="POST" action="./complete-todo.php">
            <input type="checkbox" name="completed" <?= $todo['completed'] ? 'checked' : '' ?> >
            <input type="hidden" name="_id" value="<?= $todo['id'] ?>">
          </form> 
          <div>
            <a class="<?= $todo['completed'] ? 'line-through' : '' ?>" href="./edit-todo.php?id=<?= $todo['id'] ?>"><?= $todo['description'] ?></a>
            <a href="./edit-todo.php?id=<?= $todo['id'] ?>" class="edit">Edit</a>
            <a href="./delete-todo.php?id=<?= $todo['id'] ?>" class="delete">Delete</a>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>

  <script>
    document.querySelectorAll('.todos form').forEach(form => {
      form.addEventListener('click', () => {
        form.submit();
      })
    })
  </script>
</body>
</html>