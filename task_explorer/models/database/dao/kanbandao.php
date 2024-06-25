<?php

date_default_timezone_set('America/Sao_Paulo');

class TarefaDAO{

    private PDO $conn;

public function create(
        string $task_name,
        string $task_description,
        string $task_image,
        string $task_date,
        string $id_usuario
    ): int|false {

        $id_usuario = $id_usuario != null ? $id_usuario : null;
        $query = 'INSERT INTO tasks 
        (task_name, task_description, task_image, task_date, id_usuario) 
        VALUES 
        (:task_name, :task_description, :task_image, :task_date, :id_usuario);';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':task_name', $task_name, PDO::PARAM_STR);
        $stmt->bindValue(':task_description', $task_description, PDO::PARAM_STR);
        $stmt->bindValue(':task_image', $task_image, PDO::PARAM_STR);
        $stmt->bindValue(':task_date', $task_date, PDO::PARAM_STR);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $this->conn->lastInsertId();
    }

    public function getById(int $id): array
    {
        $query = 'SELECT * FROM tasks WHERE id = :id;';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $value != false ? $value : [];
    }
}