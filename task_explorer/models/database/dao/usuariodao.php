<?php

class UsuarioDAO
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM usuarios;';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id_usuario): array
    {
        $query = 'SELECT * FROM usuarios WHERE id_usuario = :id_usuario;';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $value != false ? $value : [];
    }

    public function getByEmail(string $email): array
    {
        $query = 'SELECT * FROM usuarios WHERE email = :email;';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $value != false ? $value : [];
    }

    public function delete(int $id_usuario): bool
    {
        $query = 'DELETE FROM usuarios WHERE id_usuario = :id_usuario;';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->rowCount();
        return $value > 0 ? true : false;
    }

    public function create(
        string $nome,
        string $email,
        string $senha,
        string $tipo_usuario
    ): int|false {
        $query = 'INSERT INTO usuarios
                (nome, email, senha, tipo_usuario)
                VALUES
                (:nome, :email, :senha, :tipo_usuario);';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindValue(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);
        $stmt->execute();
        return (int) $this->conn->lastInsertId();
    }

    public function addMembro(
        string $email,
        string $tipo_usuario
        ): array
    {
        $query = 'SELECT * FROM usuarios WHERE email = ? AND INSERT INTO usuarios (tipo_usuario) VALUES (:tipo_usuario);';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $value != false ? $value : [];
    }

    public function update(
        int $id_usuario,
        string $nome,
        string $email,
        string $tipo_usuario,
        int $statusUsuario
    ): int|false {
        $query = 'UPDATE usuarios SET
            nome            = :nome,
            email           = :email,
            tipo_usuario     = :tipo_usuario
            WHERE id_usuario = :id_usuario;';
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->rowCount();
        return $value > 0 ? (int) $value : false;
    }

}