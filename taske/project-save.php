<?php
include 'models/database/database.php';
include 'models/dao/kanbandao.php';

$conn =  Database::getConexao();
$kanbanDAO = new KanbanDAO($conn);
$result = $kanbanDAO->create(
    $_POST['titulo'],
    $_POST['visibilidade'],
    $_POST['id_usuario'],
);

if ($result) {
    header('location: painel.php?message=Kanban criado com sucesso!');
    exit();
} else {
    echo $conn->errorInfo();
    exit('Erro ao inserir usuário');
}
