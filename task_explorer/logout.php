<?php
session_start();
session_destroy();// destruir a conexão para não logar utilizando as setas do navegador
header('Location: index.php'); // retornando para index.php
exit();