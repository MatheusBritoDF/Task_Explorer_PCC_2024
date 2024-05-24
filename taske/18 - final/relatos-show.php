<?php

include 'models/database/database.php';
$conn =  Database::getConexao();

$id = $_GET['id'] ?? 0;

$query = 'SELECT * FROM ouvir_etc_db.relatos WHERE id = :id;';
$stmt = $conn->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$relato = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$relato) {
    header('Location: index.php?message=Relato não encontrado.');
    exit();
}
?>
<?php include 'inc/header.php'; ?>

<h1>Relatos - Nº: <?= $relato['id']; ?></h1>

<hr>

<ul>
    <li class="lista-row">
        <h2>Data de abertura</h2>
        <h2>Tipo</h2>
        <h2>Status</h2>
    </li>

    <li class="lista-row">
        <p><?= $relato['dataabertura']; ?></p>
        <p><?= $relato['tipo']; ?></p>
        <p><?= $relato['status']; ?></p>
    </li>

    <li>
        <h2>Título</h2>
        <p><?= $relato['titulo']; ?></p>
    </li>

    <li>
        <h2>Descrição</h2>
        <p><?= $relato['descricao']; ?></p>
    </li>
</ul>

<br>
<hr>
<br>
<a href="index.php" class="btn btn-voltar">Voltar</a>

<?php include 'inc/footer.php'; ?>
