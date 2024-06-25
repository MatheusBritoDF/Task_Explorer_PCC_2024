<?php
require_once 'conexao.php';

function listarUsuarios() {
    global $conexao;
    $query = "SELECT * FROM usuarios";
    $stmt = $conexao->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function adicionarUsuario($nome, $email, $senha, $tipo_usuario) {
    global $conexao;
    $query = "INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (:nome, :email, :senha, :tipo_usuario)";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tipo_usuario', $tipo_usuario);
    return $stmt->execute();
}

function editarUsuario($id, $nome, $email, $senha, $tipo_usuario) {
    global $conexao;
    $query = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, tipo_usuario = :tipo_usuario WHERE id_usuario = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tipo_usuario', $tipo_usuario);
    return $stmt->execute();
}

function excluirUsuario($id) {
    global $conexao;
    $query = "DELETE FROM usuarios WHERE id_usuario = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
?>