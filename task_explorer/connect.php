<?php
try{
    $conn = new pdo('mysql:host=localhost;dbname=db_task_explorer', 'root','');
    
} catch(PDOExpection $e){
    echo"Erro ao se conectar: Erro" . $e->getMessage() ;
}
