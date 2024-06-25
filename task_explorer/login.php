<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    

    include ("conexao.php");
    $query = 'SELECT id_usuario FROM usuarios 
    WHERE email = :email AND senha = :senha';

// Preparando a declaração SQL
$stmt = $conexao->prepare($query);

// Substituindo os placeholders pelos valores reais e definindo os tipos dos parâmetros
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':senha', $senha, PDO::PARAM_STR);

// Executando a consulta preparada
$stmt->execute();

// Capturando o resultado da consulta
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificando se o usuário foi encontrado
if ($usuario) {
// Salvando o ID do usuário na sessão
$_SESSION['id_user'] = $usuario['id_usuario'];
} else {
// Tratamento para usuário não encontrado, como exibir uma mensagem de erro, por exemplo
echo "Usuário não encontrado.";
}

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

    if ($usuario['tipo_usuario'] == 'Administrador') {
        header('Location: adm/administrador.php');
        exit();
    } 

    $_SESSION['usuario'] = [
        'nome' => $usuario['nome'],
        'tipo' => $usuario['tipo_usuario'],
        'id_usuario'=> $usuario['id_usuario'],
    ];

    header('Location: painel.php');
    exit();


}