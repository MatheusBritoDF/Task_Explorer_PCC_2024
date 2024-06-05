<?php

class KanbanDAO
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM kanban;';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id_kanban): array
    {
        $query = 'SELECT * FROM kanban WHERE id_kanban = :id_kanban;';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_kanban', $id_kanban, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $value != false ? $value : [];
    }

    

    public function delete(int $id_kanban): bool
    {
        $query = 'DELETE FROM kanban WHERE id_kanban = :id_kanban;';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_kanban', $id_kanban, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->rowCount();
        return $value > 0 ? true : false;
    }

    public function create(
        string $titulo,
        string $visibilidade,
        int $id_usuario,
        string $tela_fundo
    ): int|false {
        $query = 'INSERT INTO kanban
                (titulo, visibilidade, id_usuario, tela_fundo)
                VALUES
                (:titulo, :visibilidade, :id_usuario, :tela_fundo);';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':visibilidade', $visibilidade, PDO::PARAM_STR);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(':tela_fundo', $tela_fundo, PDO::PARAM_STR);
        $stmt->execute();
        return (int) $this->conn->lastInsertId();
    }

    public function update(
        string $titulo,
        string $visibilidade,
        int $id_usuario,
        string $tela_fundo
    ): int|false {
        $query = 'UPDATE kanban SET
            titulo            = :titulo,
            visibilidade           = :visibilidade,
            id_usuario     = :id_usuario,
            tela_fundo   = :tela_fundo
            WHERE id_kanban = :id_kanban;';
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':visibilidade', $visibilidade, PDO::PARAM_STR);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(':tela_fundo', $tela_fundo, PDO::PARAM_STR);
        // $stmt->bindValue(':id_kanban', $id_kanban, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->rowCount();
        return $value > 0 ? (int) $value : false;
    }

}
