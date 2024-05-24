<!--O verifica_login usa a expressão ! que serve para negar a expressão, então se lê assim Se não existir a $_SESSION nome então levar para index.php -->
<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: index.php');
	exit();
}

// function verificaSeUsuarioEstaLogado()
//     {
//         return isset($_SESSION['email']);
//     }