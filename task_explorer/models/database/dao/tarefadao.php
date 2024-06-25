<?php
date_default_timezone_set('America/Sao_Paulo');
class TarefaDAO
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    
    public function getByRelatoId(int $id): array
    {   
        $query = 'SELECT * FROM respostas WHERE relatoid = :id ORDER BY dataresposta DESC;';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
        int $id,
        string $nome,
        string $list,
        int $id_task
    ): int|false {
        
        $dataResposta = date('Y-m-d H:i:s');
        $query = 'INSERT INTO tbl_list 
        (id, nome, list, id_task) 
        VALUES 
        (:id, :nome, :list, :id_task);';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':list', $list, PDO::PARAM_STR);
        $stmt->bindValue(':id_task', $id_task, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $this->conn->lastInsertId();
    }

    public function update(
        int $id,
        string $nome,
        string $list,
        int $painel
    ): int|false {
        $query = 'UPDATE tbl_list SET
        nome   = :nome,
        list   = :list,
        painel  = :painel
        WHERE id = :id;';
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':list', $list, PDO::PARAM_STR);
        $stmt->bindValue(':painel', $painel, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $value = $stmt->rowCount();
        return $value > 0 ? (int) $value : false;
    }

}
