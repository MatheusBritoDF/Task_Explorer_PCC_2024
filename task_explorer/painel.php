<?php
include ("verifica_login.php");

require __DIR__ . '/connect.php';



if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}

$stmt = $conn->prepare("SELECT * FROM tasks");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt-br" class="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/styleg1.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/task.png">
    <title>Início</title>
</head>


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
                    
                </div>
            </li>

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="funcoes.html">
                        <i class='bx bxs-home'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Funções</span>
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
                <div class="profile-details">
                    <div class="nome">
                        <?php if (!isset($_SESSION['usuario'])) {
                            header("Location: login.php");
                            exit();
                        }
                        echo "Olá, " . ucfirst($_SESSION['usuario']['nome']) . "!"; ?>

                    </div>
                    <a><i class='bx bx-log-out' onclick="return confirmarLogout();"></i></a>
                </div>
            </li>
        </ul>
    </div>

    <script>
        function confirmarLogout() {
            var resposta = confirm("Você realmente deseja fazer logout?");
            if (resposta == true) {
                window.location.href = 'logout.php';
                
            } else {
                alert("logout cancelado.");
                return false;
            }
        }
    </script>

    <!-- FIM SIDEBAR -->


        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


        </head>

        <div class="profile-details2">
            <div class="nome2">
                <?php if (!isset($_SESSION['usuario'])) {
                    header("Location: login.php");
                    exit();
                }
                echo "Bem-vindo(a) ao Task Esplorer, " . ucfirst($_SESSION['usuario']['nome']) . "!"; ?>
                <a id="butao_logout" onclick="return confirmarLogout();">Fazer logout</a>
            </div><br>
        </div>


        <div class="container">

            <?php
            if (isset($_SESSION['success'])) {
                ?>
            <div class="alert-success">
                <?php echo $_SESSION['success']; ?>
            </div>
            <?php
                unset($_SESSION['success']);
            }
            ?>

            <?php
            if (isset($_SESSION['error'])) {
                ?>
            <div class="alert-error">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php
                unset($_SESSION['error']);
            }
            ?>

            

            <div class="header">
                <h1>CRIE SEUS QUADROS</h1>
            </div>
            <div class="form">
                <form action="task.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="insert" value="insert">
                    <label for="task_name">Quadro:</label>
                    <input type="text" name="task_name" placeholder="Nome do Quadro" require>
                    <label for="task_description" class="description">Descrição:</label>
                    <input type="text" name="task_description" class="description" placeholder="Descrição do Quadro">
                    <label for="task_data">Data de encerramento:</label>
                    <input type="date" name="task_date" class="data"  style="color:#fff;">
                    <label for="task_image">Imagem:</label>
                    <input type="file" name="task_image"  style="color:#ccc;">
                    <button type="submit">Cadastrar</button>
                </form>


                <?php
                if (isset($_SESSION['message'])) {
                    echo "<p style='color: #ef5350;'>" . $_SESSION['message'] . "</p>";
                    unset($_SESSION['message']);
                }

                ?>
            </div><br>
            <!--<div class="separator">

        </div><br>
        <div class="separator">

        </div><br>-->


        </div>
        <div class="container">
            <h2 class="tarefas">Quadros</h2>
            <div class="list-tasks">

                <?php

echo "<ul>";

$stmt = $conn->prepare("SELECT * FROM tasks WHERE id_usuario = :id_usuario");
$stmt->bindParam(':id_usuario', $_SESSION['id_user'], PDO::PARAM_INT);
$stmt->execute();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $task) {
    echo "<li>
            <a href='details.php?key=" . $task['id'] . "'>" . $task['task_name'] . "</a>
            <button type='button' class='btn-clear1' data-id='" . $task['id'] . "' data-name='" . $task['task_name'] . "'>Remover</button>
          </li>";
}
echo "</ul>";
?>
            </div>
            <div class="footer">
                <p>Gerenciamento Task Explorer</p>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.btn-clear1').click(function(){
            var taskId = $(this).data('id');
            var taskName = $(this).data('name');
            if(confirm('Deseja remover o Quadro "' + taskName + '"?')) {
                $.ajax({
                    url: 'delete_task.php',
                    type: 'POST',
                    data: { id: taskId },
                    success: function(response) {
                        if(response == 'success') {
                            alert('Quadro removido com sucesso.');
                            location.reload();
                        } else {
                            alert('Falha ao remover o Quadro.');
                        }
                    },
                    error: function() {
                        alert('Erro na comunicação com o servidor.');
                    }
                });
            }
        });
    });
    </script>
</html> 
