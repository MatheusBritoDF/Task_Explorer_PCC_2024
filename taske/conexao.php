<?php
define('HOST', 'localhost');
//Ip do banco no mysql ex:127.0.0.1
define('USUARIO', 'root');
//Irá puxar o usuario padrão do banco
define('SENHA', '');
//Senha do banco de dados, como não definimos senha no banco deixamos vazio.
define('DB', 'db_task_explorer');
// nome do banco de dados.

$dsn = 'mysql:host=' . HOST . ';dbname=' . DB .';charset=utf8;';

$conexao = new PDO($dsn, USUARIO, SENHA, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);