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
    <link rel="stylesheet" href="css/style_rec1.css" />
    <link rel="icon" href="img/task.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Recuperar</title>
  </head>
  <body>
  <div class="container">
    <div class="box">
    <h4>Recuperar Senha</h4>
      <div class="signin-signup">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);

    $email = $_POST['email'];

    include ("conexao.php");

    $query = 'SELECT email FROM usuarios WHERE email = :email;';
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario){
        //echo "Deu certo"; 
        ?>
          <div class="notification is-success">
    <p>Senha enviada! Verifique seu email.</p>
    <p>Clique para fazer seu login <a href="index.php">aqui!</a></p>
  </div>
    <?php
    }else{ ?>
        <div class="notification is-fail">
    <p>Seu email não está cadastrado!</p>
    <p><a href="index.php">Clique aqui para fazer seu cadastro</a></p>
  </div>
    <?php }

    /*
    if (!$usuario || $senha != $usuario['senha']) {
        //header('Location: index.php?message=Usuário ou senha inválidos.');
        echo "<script>
        alert('E-mail ou senha inválido');
        window.location.href = 'index.php';
        </script>";
        exit();
    }

    $_SESSION['usuario'] = [
        'nome' => $usuario['nome'],
        'tipo' => $usuario['tipo_usuario'],
    ];
    header('Location: painel.php');
    exit();

    */
}
?>
<a href="index.php"><img src="img/task.png" alt="task" class="image"></a> 

<script src="js/app.js"></script>
</body>

</html>
