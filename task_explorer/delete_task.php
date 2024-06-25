<?php
require 'connect.php'; // Certifique-se de que o caminho está correto

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Log para verificar o ID recebido
    error_log("ID recebido para exclusão: " . $id);

    // Preparar e executar a exclusão da tarefa
    $stmt = $conn->prepare('DELETE FROM tasks WHERE id = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        // Log para verificar falha na execução
        error_log("Falha na exclusão da tarefa: " . print_r($stmt->errorInfo(), true));
        echo 'failure';
    }
} else {
    // Log para verificar se o ID não foi recebido
    error_log("ID não recebido.");
    echo 'no_id';
}
?>
