<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configurações do banco de dados
$host = 'localhost';
$dbname = 'db_task_explorer';
$username = 'root';
$password = '';

// Tente estabelecer a conexão com o banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se ocorrer um erro ao conectar, exibir uma mensagem de erro e interromper o script
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Verificar se os dados foram enviados corretamente
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obter os dados do formulário
    $id_cartao = $_POST["id_cartao"];
    $id_lista = $_POST["id_lista"];

    try {
        // Preparar e executar a consulta SQL para atualizar o id_lista no banco de dados
        $stmt = $pdo->prepare("UPDATE cartoes SET id_lista = :id_lista WHERE id_cartao = :id_cartao");
        $stmt->bindParam(':id_lista', $id_lista);
        $stmt->bindParam(':id_cartao', $id_cartao);

        if ($stmt->execute()) {
            // Se a atualização for bem-sucedida, retornar uma mensagem de sucesso
            echo "ID da lista atualizado com sucesso!";
        } else {
            // Se ocorrer um erro, retornar uma mensagem de erro
            echo "Erro ao atualizar o ID da lista.";
        }
    } catch (PDOException $e) {
        // Se ocorrer um erro ao executar a consulta, exibir uma mensagem de erro
        echo "Erro ao executar a consulta: " . $e->getMessage();
    }
}

// Fechar a conexão PDO
$pdo = null;
?>
