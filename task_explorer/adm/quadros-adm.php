<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="../css/tarefa1.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/task.png">
</head>

<style>
    html{
        background: #14ca3f00;
    }
</style>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-details">
            <img src="img/taske2-andre-lindo.png" alt="">
            <span class="logo_name">Task Explorer</span>
        </div>
        <ul class="nav-links">

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="../homepage.html">
                        <i class='bx bxs-home'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Home</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="suporte.html">
                        <i class='bx bx-help-circle'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Suporte</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="administrador.php">
                        <i class='bx bx-home'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Retornar</span>
                    </a>
                </div>
            </li>

        </ul>
    </div>

    <!-- FIM SIDEBAR -->

<div class="container">
    <h1>Gerenciador de Tarefas</h1>
    
    <!-- Botão para adicionar nova tarefa -->
    <a href="add_task.php" class="btn add-btn">Adicionar Tarefa</a>
    
    <!-- Lista de tarefas -->
    <div class="tasks-list">
        <?php
        // Conexão com o banco de dados usando PDO
        require 'config.php';
        
        // Query para selecionar todas as tarefas
        $query = "SELECT * FROM tasks";
        $stmt = $pdo->query($query);
        
        // Loop através das tarefas
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="task">';
            echo '<h2>' . htmlspecialchars($row['task_name']) . '</h2>';
            echo '<p class="data">Data: ' . htmlspecialchars($row['task_date']) . '</p>';
            echo '<p class="descricao">' . htmlspecialchars($row['task_description']) . '</p>';
            echo '<img src="../uploads/' . htmlspecialchars($row['task_image']) . '" alt="Imagem da Tarefa">';
            // Botões para editar e excluir (links para páginas separadas)
            echo '<a href="edit_task.php?id=' . $row['id'] . '" class="btn edit-btn">Editar</a>';
            echo '<a href="delete_task.php?id=' . $row['id'] . '" class="btn delete-btn" onclick="return confirmarExclusao();">Excluir</a>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<script>
        function confirmarExclusao() {
            var resposta = confirm("Você realmente deseja excluir esta tarefa?");
            if (resposta) {
                alert("Item excluído com sucesso!"); // Mensagem opcional de sucesso
                window.location.href = 'quadros-adm.php'; // Redireciona após exclusão
                return true;
            } else {
                alert("Exclusão cancelada.");
                return false;
            }
        }
    </script>

</body>
</html>
