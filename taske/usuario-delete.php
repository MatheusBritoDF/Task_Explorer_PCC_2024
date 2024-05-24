<?php

$dsn = 'mysql:host=' . HOST . 'dbname=' . DB . ';charset=utf8;';

$conexao = new PDO($dsn, 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = 'DELETE FROM usuarios WHERE id_usuario = :id_usuario';
$stmt = $conexao->prepare($query);
$stmt->bindValue(':id_usuario', $_GET['id_usuario'], PDO::PARAM_INT);

if ($stmt->execute()) {
    header('location: index.php');
    exit();
} else {
    echo $conexao->errorInfo();
}

var_dump($_POST);