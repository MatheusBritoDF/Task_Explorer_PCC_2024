<?php
    session_start();
   
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <link rel="icon" href="img/task.png">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Cadastro</h3>
                    <h3 class="title has-text-grey"><a href="index.php">Crie sua Conta</a></h3>
                    
                    <?php
                     if(isset($_SESSION['status_cadastro'])): //os dois pontos ':' siginifica fechamento verdadeiro//
                    ?>
                    <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>
                    <?php
                    if(isset($_SESSION['usuario_existe'])):
                    ?>
                    <div class="notification is-info">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['usuario_existe']);
                    ?> 
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="nome" type="text" class="input is-large" placeholder="Nome" autofocus required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="email" type="email" class="input is-large" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha" required>
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                            <br>
                            <button class="button-as-link">
                                <a href="index.php">Já possui uma conta? Clique aqui.</a>
                            </button>
                            <br>
                            <button class="button-as-link">
                                <a href="Inicio/home_page">Volte para a página inicial</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>