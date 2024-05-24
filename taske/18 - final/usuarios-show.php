<?php

include 'models/database/database.php';
$conn =  Database::getConexao();

$id = $_GET['id'] ?? 0;

$query = 'SELECT * FROM ouvir_etc_db.usuarios WHERE id = :id;';
$stmt = $conn->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$usuario) {
    header('Location: usuarios.php?message=Usuário não encontrado.');
    exit();
}
?>
<?php include 'inc/header.php'; ?>


<h1>Usuário - Nº: <?= $usuario['id']; ?></h1>

<hr>

<ul>
    <li>
        <h2>Nome</h2>
        <p><?= $usuario['nome']; ?></p>
    </li>

    <li>
        <h2>E-mail</h2>
        <p><?= $usuario['email']; ?></p>
    </li>

    <li>
        <h2>Tipo</h2>
        <p><?= $usuario['tipousuario']; ?></p>
    </li>

    <li>
        <h2>Status</h2>
        <p><?= $usuario['statususuario']; ?></p>
    </li>
</ul>

<br>
<hr>
<br>
<a href="usuarios.php" class="btn btn-voltar">Voltar</a>
<?php include 'inc/footer.php'; ?>