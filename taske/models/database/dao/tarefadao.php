<?php

class tarefaDAO
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    
    // public function getByRelatoId(int $id): array
    // {   
    //     $query = 'SELECT * FROM respostas WHERE relatoid = :id ORDER BY dataresposta DESC;';
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function create(
        string $resposta,
        int $relatoId,
        int $usuarioId
    ): int|false {
        
        $query = 'INSERT INTO cartoes 
        (titulo, descricao, statusresposta, usuarioid, relatoid) 
        VALUES 
        (:titulo, :descricao, :statusresposta, :usuarioid, :relatoid);';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':descricao', $resposta, PDO::PARAM_STR);
        $stmt->bindValue(':statusresposta', 0, PDO::PARAM_INT);
        $stmt->bindValue(':relatoid', $relatoId, PDO::PARAM_INT);
        $stmt->bindValue(':usuarioid', $usuarioId, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $this->conn->lastInsertId();
    }
}
