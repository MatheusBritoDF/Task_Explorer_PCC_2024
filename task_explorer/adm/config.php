<?php
$host = 'localhost'; // Seu host
$dbname = 'db_task_explorer'; // Nome do seu banco de dados
$username = 'root'; // Seu usuário do banco de dados
$password = ''; // Sua senha do banco de dados

// Conexão usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar: ' . $e->getMessage());
}
?>
