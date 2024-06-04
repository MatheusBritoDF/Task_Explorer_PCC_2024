<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/painel.css">
    <link rel="icon" href="img/task.png">
    <title>Novo Quadro</title>
</head>
<body>
    
    <h1>Criar Quadro</h1>
    <div class="container">
        <form action="project-save.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_usuario" value="1">

            <h2>Título</h2>
            <p class="insert-title">
                <input type="text" name="titulo" placeholder="Insira um título" autofocus required>
            </p>
            
            <h2>Visibilidade</h2>
                <select name="visibilidade" id="" class="select-box">
                    <option value="Área de Trabalho">Área de Trabalho</option>
                    <option value="Público">Público</option>
                    <option value="Privado">Privado</option>
                </select>

            
            <div class="background_image">
                <h2>Imagem de Fundo</h2>
                <img src="https://images.unsplash.com/photo-1714383524948-ebc87c14c0f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0NHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <img src="https://images.unsplash.com/photo-1714591755376-349fd01b41cb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2MHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <img src="https://images.unsplash.com/photo-1714833890840-a3c4f446c194?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2OHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>

            <div class="btn">
               <button>Criar Quadro</button>
            </div><br>
            <div class="btn-voltar">
                <a href="painel.php">Voltar</a>
            </div>
        </form>
    </div>
    
</body>
</html>
