<?php

include 'models/database/database.php';
include 'models/database/dao/kanbandao.php';
include 'models/database/dao/tarefadao.php';

$conn = Database::getConexao();
$kanbanDAO = new KanbanDAO($conn);
$id_kanban = $kanbanDAO->getById($id_kanban);
if (!$kanban) {
    header('Location: painel.php?message=Kanban não encontrado.');
    exit();
}

