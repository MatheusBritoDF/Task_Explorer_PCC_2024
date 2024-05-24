<?php

include 'models/database/database.php';
$conn =  Database::getConexao();

$query = 'DELETE FROM usuarios WHERE id = :id';
$stmt = $conn->prepare($query);
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

if ($stmt->execute()) {
    header('location: usuarios.php');
    exit();
} else {
    echo $conn->errorInfo();
}


