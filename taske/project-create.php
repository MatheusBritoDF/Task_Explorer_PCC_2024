<?php

include 'conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/task.png">
    <title>Novo Quadro</title>
</head>
<body>
    
    <h1>Criar Quadro</h1>
    <div class="container">
        <form action="project-save.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="" value="">

            <h2>Título</h2>
            <p>
                <input type="text" name="titulo" placeholder="Insira um título" autofocus required>
            </p>
            
            <h2>Visibilidade</h2>
                <select name="" id="">Visibilidade
                    <option value="desktop">Área de Trabalho</option>
                    <option value="public">Público</option>
                    <option value="private">Privado</option>
                </select>

            <?php
            $visibilidade = $_GET['visibilidade'] ?? '';

            if($visibilidade === 'desktop'){
                $tipovisibilidade = 'Área de Trabalho';
            } elseif ($visibilidade === 'publico') {
                $tipovisibilidade = 'Público';
            } else {
                $tipovisibilidade = 'Privado';
                $visibilidade = 'privado';
            }
            ?>

            <?php
            // $sql = 'INSERT INTO'; guardar no banco de dados o link da imagem
            ?>
            <div class="background_image">
                <h2>Imagem de Fundo</h2>
                <img src="https://images.unsplash.com/photo-1714383524948-ebc87c14c0f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0NHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <img src="https://images.unsplash.com/photo-1714591755376-349fd01b41cb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2MHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <img src="https://images.unsplash.com/photo-1714833890840-a3c4f446c194?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2OHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>

            <div class="">
                <a class="" href="">Criar Quadro</a>
            </div>
        </form>
    </div>
    
</body>
</html>
