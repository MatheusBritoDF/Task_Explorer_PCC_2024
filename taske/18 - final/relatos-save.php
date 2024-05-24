<?php
session_start();

include 'models/database/database.php';
$conn =  Database::getConexao();

$usuarioId = isset($_SESSION['usuario']) ? $_SESSION['usuario']['id'] : null;

$query = 'INSERT INTO `relatos` 
(dataabertura, titulo, descricao, tipo, usuarioid, anexo) 
VALUES 
(:dataabertura, :titulo, :descricao, :tipo, :usuarioid, :anexo);';
$stmt = $conn->prepare($query);
$stmt->bindValue(':dataabertura', date('Y-m-d H:i:s'), PDO::PARAM_STR);
$stmt->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$stmt->bindValue(':descricao', $_POST['descricao'], PDO::PARAM_STR);
$stmt->bindValue(':tipo', $_POST['tipo'], PDO::PARAM_STR);
$stmt->bindValue(':usuarioid', $usuarioId, PDO::PARAM_INT);
$stmt->bindValue(':anexo', '', PDO::PARAM_STR);

if ($stmt->execute()) {
    header('location: index.php');
    exit();
} else {
    echo $conn->errorInfo();
}



