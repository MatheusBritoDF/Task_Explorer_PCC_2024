<?php
session_start();

include 'models/database/database.php';
$conn =  Database::getConexao();

$usuarioId = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

$query = 'INSERT INTO `cartoes` 
(titulo, descricao, nivel_prioridade) 
VALUES 
(:titulo, :descricao, :nivel_prioridade);';
$stmt = $conn->prepare($query);
$stmt->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$stmt->bindValue(':descricao', $_POST['descricao'], PDO::PARAM_STR);
$stmt->bindValue(':nivel_prioridade', $_POST['tipo'], PDO::PARAM_STR);


if ($stmt->execute()) {
    header('location: index.php');
    exit();
} else {
    echo $conn->errorInfo();
}