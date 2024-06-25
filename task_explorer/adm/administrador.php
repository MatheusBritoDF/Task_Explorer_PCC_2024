<?php
require_once '../conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br" class="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adm.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/task.png">
    <title>Início</title>
</head>



<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-details">
            <img src="../img/taske2-andre-lindo.png" alt="">
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
                    <a class="link_as_button" href="../suporte.html">
                        <i class='bx bx-help-circle'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Suporte</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="usuarios-adm.php">
                        <i class='bx bx-user'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Usúarios</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="quadros-adm.php">
                        <i class='bx bx-table'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Quadros</span>
                    </a>
                </div>
            </li>

        </ul>
    </div>
    <!-- FIM SIDEBAR -->


    <div>
        <h1 class="h1">Olà Administrador</h1>  <br>
        <a id="butao_logout" onclick="return confirmarLogout();">Fazer logout</a>
      <h2 class="h2">Painel do Administrador</h2>
    </div>

    <script>
        function confirmarLogout() {
            var resposta = confirm("Você realmente deseja fazer logout?");
            if (resposta == true) {
                window.location.href = '../logout.php';
                
            } else {
                alert("logout cancelado.");
                return false;
            }
        }
    </script>

    <div class="container">
        
        <div class="box">
            <h2>Bem vindo(a) ao Task Explore!</h2><br>
            <h3>Aqui estão alguns caminhos para você organizar seu site!</h3>

            <div class="box3">
            <a href="usuarios-adm.php" class="btn1">Usuários</a><br>
            <a href="quadros-adm.php" class="btn2">Quadros</a>
            <img src="../img/task.png" alt="">
            </div>
        </div>
    </div>

