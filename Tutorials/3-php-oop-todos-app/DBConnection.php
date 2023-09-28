<?php

class DBConnection
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

    public function fetch($table, ...$params)
    {
        $smtp = $this->pdo->prepare("SELECT * FROM $table where id = ?");
        $smtp->execute($params);
        return $smtp->fetch();

    }

    public function fetchAll($table)
    {
        $smtp = $this->pdo->query("SELECT * FROM $table");
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
