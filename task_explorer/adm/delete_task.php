<?php
// Verifica se o ID da tarefa foi fornecido via GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: quadros-adm.php');
    exit();
}

// Conexão com o banco de dados usando PDO
require 'config.php'; // Arquivo de configuração do PDO

// Exemplo simples de exclusão (preparação e execução da query)
$taskId = $_GET['id'];
$query = "DELETE FROM tasks WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(array(':id' => $taskId));

// Redireciona para a página principal após excluir a tarefa
header('Location: quadros-adm.php');
exit();
?>
