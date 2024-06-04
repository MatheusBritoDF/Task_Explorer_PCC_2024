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


$query = 'INSERT INTO `usuarios` 
(nome, email, senha, tipo_usuario) 
VALUES
(:nome, :email, :senha, :tipo_usuario)';
$stmt = $conexao->prepare($query);

$stmt->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue(':senha', $_POST['senha'], PDO::PARAM_STR);
$stmt->bindValue(':tipo_usuario', 'Usuário');

if ($stmt->execute()) {
    $_SESSION['status_cadastro'] = true;
    //header('Location: painel.php');
    echo "<script>
    alert('Usuário cadastrado com sucesso');
    window.location.href = 'index.php';
    </script>";
    exit();
    //exit;
} else {
    echo $conexao->errorInfo();
}

