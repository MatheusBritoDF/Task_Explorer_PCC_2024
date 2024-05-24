<?php

include 'config.php';

class Database
{
    public static function getConexao()
    {
        try {
            $dsn = "mysql:host=" . HOST . ";dbname=" . DB . ";charset=utf8;";

            return new PDO($dsn, USUARIO, SENHA, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            echo 'Erro ao acessar servidor: ';
            exit();
        }
    }
}