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
    $titulo = $_POST["titulo"];

    try {
        // Preparar e executar a consulta SQL para inserir a tarefa no banco de dados
        $stmt = $pdo->prepare("INSERT INTO cartoes (titulo, descricao, nivel_prioridade, id_lista) VALUES (:titulo, NULL, NULL, 1)");
        $stmt->bindParam(':titulo', $titulo);

        if ($stmt->execute()) {
            // Se a inserção for bem-sucedida, retornar o ID do cartão e uma mensagem de sucesso
            $id_cartao = $pdo->lastInsertId();
            echo json_encode(['message' => 'Tarefa salva com sucesso!', 'id_cartao' => $id_cartao]);
        } else {
            // Se ocorrer um erro, retornar uma mensagem de erro
            echo json_encode(['message' => 'Erro ao salvar a tarefa.']);
        }
    } catch (PDOException $e) {
        // Se ocorrer um erro ao executar a consulta, exibir uma mensagem de erro
        echo json_encode(['message' => 'Erro ao executar a consulta: ' . $e->getMessage()]);
    }
}

// Fechar a conexão PDO
$pdo = null;
?>
