<?php
// Verifica se o ID da tarefa foi fornecido via GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit();
}

// Conexão com o banco de dados usando PDO
require 'config.php'; // Arquivo de configuração do PDO

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados do formulário
    $taskId = $_GET['id'];
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];
    $taskDate = $_POST['task_date'];
    
    // Exemplo simples de atualização (preparação e execução da query)
    $query = "UPDATE tasks SET task_name = :task_name, task_description = :task_description, task_date = :task_date WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ':task_name' => $taskName,
        ':task_description' => $taskDescription,
        ':task_date' => $taskDate,
        ':id' => $taskId
    ));
    
    // Redireciona para a página principal após editar a tarefa
    header('Location: index.php');
    exit();
}

// Seleciona os detalhes da tarefa com base no ID fornecido
$taskId = $_GET['id'];
$query = "SELECT * FROM tasks WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(array(':id' => $taskId));
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    // Se não encontrar a tarefa, redireciona de volta para a página principal
    header('Location: quadros-adm.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Tarefa</title>
<link rel="stylesheet" href="tarefa.css">
</head>
<body>
<div class="container">
    <h1>Editar Tarefa</h1>
    <form method="POST" action="">
        <label for="task_name">Nome da Tarefa:</label><br>
        <input type="text" id="task_name" name="task_name" value="<?php echo htmlspecialchars($task['task_name']); ?>" required><br>
        
        <label for="task_description">Descrição:</label><br>
        <textarea id="task_description" name="task_description" rows="4" required><?php echo htmlspecialchars($task['task_description']); ?></textarea><br>
        
        <label for="task_date">Data:</label><br>
        <input type="date" id="task_date" name="task_date" value="<?php echo $task['task_date']; ?>" required><br><br>
        
        <input type="submit" value="Salvar Alterações">
    </form>
</div>
</body>
</html>
