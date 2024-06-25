<?php
// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se foi enviado um arquivo de imagem
    if (isset($_FILES['task_image']) && $_FILES['task_image']['error'] === UPLOAD_ERR_OK) {
        // Conexão com o banco de dados usando PDO
        require 'config.php'; // Arquivo de configuração do PDO
        
        // Dados do formulário
        $taskName = $_POST['task_name'];
        $taskDescription = $_POST['task_description'];
        $taskDate = $_POST['task_date'];
        
        // Diretório onde a imagem será salva
        $uploadDir = '../uploads/';
        
        // Verifica se o diretório de upload existe ou tenta criá-lo
        if (!file_exists($uploadDir) && !mkdir($uploadDir, 0777, true)) {
            echo "Falha ao criar diretório de upload.";
            exit();
        }
        
        // Move o arquivo temporário para o diretório de uploads
        $uploadFile = $uploadDir . basename($_FILES['task_image']['name']);
        
        if (move_uploaded_file($_FILES['task_image']['tmp_name'], $uploadFile)) {
            // Arquivo movido com sucesso, agora podemos inserir no banco de dados
            $taskImage = basename($_FILES['task_image']['name']);
            
            // Exemplo simples de inserção (preparação e execução da query)
            $query = "INSERT INTO tasks (task_name, task_description, task_image, task_date) VALUES (:task_name, :task_description, :task_image, :task_date)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                ':task_name' => $taskName,
                ':task_description' => $taskDescription,
                ':task_image' => $taskImage,
                ':task_date' => $taskDate
            ));
            
            // Redireciona para a página principal após adicionar a tarefa
            header('Location: quadros-adm.php');
            exit();
        } else {
            echo "Falha ao mover o arquivo para o diretório de uploads.";
        }
    } else {
        echo "Erro no upload do arquivo de imagem.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adicionar Tarefa</title>
<link rel="stylesheet" href="tarefa.css">
</head>
<body>
<div class="container">
    <h1>Adicionar Tarefa</h1>
    <form action="add_task.php" method="post" enctype="multipart/form-data">
    <label for="task_name">Nome da Tarefa:</label><br>
    <input type="text" id="task_name" name="task_name"><br>
    
    <label for="task_description">Descrição da Tarefa:</label><br>
    <textarea id="task_description" name="task_description"></textarea><br>
    
    <label for="task_image">Imagem da Tarefa:</label><br>
    <input type="file" id="task_image" name="task_image"><br>
    
    <label for="task_date">Data da Tarefa:</label><br>
    <input type="date" id="task_date" name="task_date"><br><br>
    
    <input type="submit" value="Adicionar Tarefa">
</form>

</div>
</body>
</html>
