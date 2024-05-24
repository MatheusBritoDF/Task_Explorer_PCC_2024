<?php
session_start();
include 'conexao.php';

if(!$_SESSION['usuario']) {
	header('Location: index.php');
	exit();
}

$id_kanban = $_GET['id_kanban'];

$conexao = open_connection();

// Recupera os detalhes do projeto
$stmt = $conexao->prepare("SELECT * FROM kanban WHERE id_kanban = ?");
$stmt->bind_param("i", $id_kanban);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $kanban = $result->fetch_assoc();
} else {
    echo "Projeto não encontrado.";
    exit;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($kanban['titulo']); ?></title>
</head>
<body>
    <h2><?php echo htmlspecialchars($kanban['titulo']); ?></h2>
    <p>Visibilidade: <?php echo htmlspecialchars($kanban['visibilidade']); ?></p>
    <!-- Adicione aqui o restante da interface do seu quadro Kanban, incluindo listas e cartões -->
</body>
</html>
