<?php

include 'models/database/database.php';
$conn =  Database::getConexao();

$query = 'UPDATE `usuarios` SET 
            nome            = :nome, 
            email           = :email, 
            tipousuario     = :tipousuario, 
            statususuario   = :statususuario
        WHERE id = :id;';
$stmt = $conn->prepare($query);
$stmt->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue(':tipousuario', $_POST['tipo'], PDO::PARAM_INT);
$stmt->bindValue(':statususuario', $_POST['status'], PDO::PARAM_INT);
$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

if ($stmt->execute()) {
    header('location: usuarios.php');
    exit();
} else {
    echo $conn->errorInfo();
    exit('Erro ao atualizar usuário');
}



