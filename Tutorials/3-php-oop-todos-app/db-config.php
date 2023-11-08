
<?php

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
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Connected successfully";
    // $todosStmt = $pdo->query('SELECT * FROM todos');
    // $todos = $todosStmt->fetchAll();

} catch (Exception $error) {
    die("Database connection was not successful {$error->getMessage()}");
}
