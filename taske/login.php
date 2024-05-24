<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include ("conexao.php");

    $query = 'SELECT * FROM usuarios 
        WHERE email = :email AND senha = :senha;';
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

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
}