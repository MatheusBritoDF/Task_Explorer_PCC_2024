<?php
include ('conn.php');

if (isset($_GET['list'])) {
    $list = $_GET['list'];

    try {

        $query = "DELETE FROM tbl_list WHERE id = '$list'";

        $stmt = $conn->prepare($query);

        $query_execute = $stmt->execute();

        if ($query_execute) {
            echo "
            <script>
            alert('tarefa deletada com sucesso!');
            history.back(); 
        </script>
            ";
        } else {
            echo "
                <script>
                    alert('Erro ao deletar tarefa!');
                    history.back();
                </script>
            ";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
