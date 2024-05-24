<?php
include 'inc/header.php';
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

<h1>Alterar Usuário</h1>

<hr>

<form action="usuarios-update.php" method="post">
    <input type="hidden" name="id" value="<?=$id; ?>">
    <ul>
        <li>
            <h2>Nome</h2>

            <p>
                <input class="form-controle" type="text" name="nome" placeholder="Informe o nome do usuário." 
                required 
                autofocus
                value="<?= $usuario['nome'] ?? '';?>"
                >
            </p>
        </li>

        <li>
            <h2>E-mail</h2>

            <p>
                <input class="form-controle" type="email" name="email" placeholder="Informe o e-mail do usuário." 
                required
                value="<?= $usuario['email'] ?? '';?>"
                >
            </p>
        </li>

        <li>
            <h2>Status</h2>

            <p>
                <select name="status" class="form-controle">
                    <option value="1" <?= ($usuario['statususuario'] == '1') ? 'selected': '';?>>Ativo</option>
                    <option value="0"<?= ($usuario['statususuario'] == '0') ? 'selected': '';?> >Inativo</option>
                </select>
            </p>
        </li>

        <li>
            <h2>Tipo</h2>

            <p>
                <select name="tipo" class="form-controle">
                    <option value="1" <?= ($usuario['tipousuario'] == 'ADMIN') ? 'selected': '';?>>Administrador</option>
                    <option value="2" <?= ($usuario['tipousuario'] == 'USUARIO') ? 'selected': '';?>>Usuário</option>
                    <option value="3" <?= ($usuario['tipousuario'] == 'ANALISTA') ? 'selected': '';?>>Analista</option>
                </select>
            </p>
        </li>

    </ul>

    <br>
    <button class="btn">Enviar</button>
    <a class="btn btn-voltar" href="usuarios.php">Voltar</a>
</form>

<?php include 'inc/footer.php'; ?>