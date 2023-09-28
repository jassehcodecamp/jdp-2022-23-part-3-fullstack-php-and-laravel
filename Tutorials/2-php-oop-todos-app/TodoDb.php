<?php

class TodoDb
{
    public $pdo;

    public function __construct()
    {

        $host = '127.0.0.1';
        $db   = 'todos_app';
        $user = 'jcc';
        $pass = 'jcc';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
            // echo "Connected successfully";
            // $todosStmt = $pdo->query('SELECT * FROM todos');
            // $todos = $todosStmt->fetchAll();

        } catch (Exception $error) {
            die("Database connection was not successful {$error->getMessage()}");
        }

    }

    public function getTodo($id)
    {
        $smtp = $this->pdo->prepare("SELECT * FROM todos where id=?");
        $smtp->execute([$id]);
        return $smtp->fetch();

    }

    public function getTodos()
    {
        $smtp = $this->pdo->query('SELECT * FROM todos');
        return $smtp->fetchAll();

    }

    public function storeTodo($todo)
    {
        $stmt = $this->pdo->prepare("INSERT INTO todos (description) VALUES (?)");
        return $stmt->execute($todo);
    }

    public function updateTodo($todo, $todoId)
    {
        $stmt = $this->pdo->prepare("Update todos  set description = ? where id = ?");
        return $stmt->execute([$todo, $todoId]);
    }

    public function deleteTodo($todoId)
    {
        $stmt = $this->pdo->prepare("Delete from todos where id = ?");
        return $stmt->execute([$todoId]);
    }
}
