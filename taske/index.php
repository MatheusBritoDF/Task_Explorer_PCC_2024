<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="icon" href="img/task.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Login</title>
  </head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <?php
        if (isset($_SESSION['nao_autenticado'])):
          ?>
          <!--  Isset: é um função nativa do PHP que serve para saber se uma variável está definida-->
          <div class="notification is-danger">
            <p>ERRO: Usuário ou senha inválidos.</p>
          </div>
          <!-- Esse bloco tem a função de aviso de Erro-->
          <?php
        endif;//ENDIF funciona executando blocos de comandos a partir da primeira expressão que retorne verdade.                    
        unset($_SESSION['nao_autenticado']); //limpar a seção
        ?>


        <form action="login.php" method="POST" class="sign-in-form">
          <h2 class="title">Login</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email" autofocus required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho"
              class="olho">
            <input type="password" name="senha" placeholder="Senha" id="pass" required />
          </div>
          <div class="g-recaptcha" data-sitekey="6LfkEuEpAAAAAE5f_XD6IQpxNC0eyY82nlXZYG_J"></div>
          <!--Parte do recaptcha -->

          <a href="painel.php"></a><input type="submit" value="Login" class="btn solid" onclick="return valida()" /></a>

          <script src="recaptcha/script.js"></script>

      

          <div>
            <a href="recuperar.php" method="post" type="submit" class="rec">Esqueceu a senha?</a>
          </div>

          <p class="social-text">Nossas redes sociais</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>

        <?php
        if (isset($_SESSION['status_cadastro'])): //os dois pontos ':' siginifica fechamento verdadeiro//
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
        if (isset($_SESSION['usuario_existe'])):
          ?>
          <div class="notification is-info">
            <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
          </div>
          <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>

        <form action="cadastrar.php" method="POST" class="sign-up-form">

          <h2 class="title">Cadastre-se</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="nome" id="nome" placeholder="Nome" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho"
              class="olho">
            <input type="password" name="senha" id="pass" placeholder="Senha" required />
          </div>

          <a href="index.php"><input type="submit" class="btn" value="Cadastrar" /></a>
          <p class="social-text">Nossas redes sociais</p>

          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>


      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Não tem uma conta?</h3>
          <p>
            Faça seu cadastro e inicie seu gerenciamento de tarefas!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Cadastra-se
          </button>
        </div>
        <a href="homepage.html"><img src="img/task.png" class="image" alt="" /></a>
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Já tem uma conta?</h3>
          <p>
            Faça seu Login e inicie seu gerenciamento de tarefas!
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Login
          </button>
        </div>
        <a href="homepage.html"><img src="img/task.png" class="image" alt="" /></a>
      </div>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>
