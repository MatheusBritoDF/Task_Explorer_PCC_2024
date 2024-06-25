<?php

require __DIR__ . '/connect.php'; // Certifique-se de que o arquivo connect.php esteja corretamente definido.
include 'models/database/database.php';
include 'models/database/dao/tarefadao.php';

session_start();


if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = []; // Inicialize como um array vazio se não estiver definido.
}



if(isset($_POST['task_name']) && !empty($_POST['task_name'])) {
    $file_name = ''; // Inicialize $file_name
    if(isset($_FILES['task_image'])){
        $ext = strtolower(substr($_FILES['task_image']['name'], -4));
        $file_name = md5(date('Y.m.d.H.i.s')) . $ext;
        $dir= 'uploads/';
        move_uploaded_file($_FILES['task_image']['tmp_name'], $dir.$file_name);
    }

 
    $stmt = $conn->prepare('SELECT id_usuario FROM USUARIOS ');
    $stmt->execute();

    $stmt = $conn->prepare('INSERT INTO tasks (task_name, task_description, task_image, task_date, id_usuario) VALUES(:name, :description, :image, :date, :user_id)');
    $stmt->bindParam(':name', $_POST['task_name']);
    $stmt->bindParam(':description', $_POST['task_description']);
    $stmt->bindParam(':image', $file_name);
    $stmt->bindParam(':date', $_POST['task_date']);
    $stmt->bindParam(':user_id', $_SESSION['id_user']);

    if($stmt->execute()){
        $_SESSION['success'] = "Dados cadastrados.";
        header('location:painel.php');
        exit; // Termina o script depois de redirecionar
    }else{
        $_SESSION['error'] = "Dados não cadastrados.";
        header('location:painel.php');
        exit; // Termina o script depois de redirecionar
    }
} else {
    $_SESSION['message'] = "O campo tarefa não está preenchido!";
    header('location:painel.php');
    exit(); // Termina o script depois de redirecionar
}