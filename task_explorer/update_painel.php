<?php
include('conn.php');

if (isset($_POST['id']) && isset($_POST['painel'])) {
    $id = $_POST['id'];
    $painel = $_POST['painel'];

    $stmt = $conn->prepare("UPDATE tbl_list SET painel = :painel WHERE id = :id");
    $stmt->bindParam(':painel', $painel);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Painel atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar painel.";
    }
} else {
    echo "Dados inválidos.";
}
?>
