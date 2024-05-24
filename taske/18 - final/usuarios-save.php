<?php

include 'models/database/database.php';
$conn =  Database::getConexao();

$query = 'INSERT INTO `usuarios` 
(`nome`, `email`, `password`, `tipousuario`, `statususuario`) 
VALUES 
(:nome, :email, :password, :tipousuario, :statususuario);';
$stmt = $conn->prepare($query);
$stmt->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
$stmt->bindValue(':tipousuario', $_POST['tipo'], PDO::PARAM_INT);
$stmt->bindValue(':statususuario', $_POST['status'], PDO::PARAM_INT);

if ($stmt->execute()) {
    header('location: usuarios.php');
    exit();
} else {
    echo $conn->errorInfo();
    exit('Erro ao inserir usuário');

}



