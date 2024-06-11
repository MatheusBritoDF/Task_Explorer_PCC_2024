<?php
session_start();
include ("conexao.php");

$nome = trim($_POST['nome']); //trim serve para tirar o espaço do inicio e fim da string e mysqli_real_escape_string serve para limpar a string que, no caso, será enviada ao banco de dados. Essa função ajuda na prevenção de SQL Injection, pois não deixa que alguns caracteres como \n, ', ", entre outros qubrem sua query ou mesmo cheguem no seu BD e assim cause algum estrago.//

$email = trim($_POST['email']);
//função MD5 para criptografar a senha//

$senha = trim(md5($_POST['senha']));

$query = 'SELECT count(*) AS total FROM usuarios WHERE email = :email;';
$stmt = $conexao->prepare($query);
$stmt->bindValue(':email', $email);
$stmt->execute();
$email = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$email) {
    header('Location: cadastro.php');
    exit();
}

// Verifica se os campos foram preenchidos
if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['tipo_usuario'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];
  
    // Insere o novo usuário no banco de dados
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $senha); // Aqui não criptografa a senha
    $stmt->bindParam(4, $tipo_usuario);
    
    if ($stmt->execute()) {
      $_SESSION['status_cadastro'] = true;
      header('Location: index.php');
      exit();
    } else {
      $_SESSION['erro_cadastro'] = true;
      header('Location: index.php');
      exit();
    }
  }
  ?>
