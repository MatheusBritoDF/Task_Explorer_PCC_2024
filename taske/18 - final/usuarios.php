<?php
include 'models/database/database.php';
$conn =  Database::getConexao();

$query = 'SELECT * FROM ouvir_etc_db.usuarios;';
$stmt = $conn->query($query);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = 0;
?>
<?php include 'inc/header.php'; ?>

<h1>Usuários</h1>

<div class="div-create">
    <a href="usuarios-create.php" class="btn">Novo usuário</a>
</div>
<table>
    <thead>
        <th>#</th>
        <th>Nome</th>
        <th>E-nmail</th>
        <th>Tipo</th>
        <th>Ação</th>
    </thead>

    <tbody>
        <?php if ($usuarios) : ?>
            <?php foreach ($usuarios as $usuario) :
                $count++; ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= htmlspecialchars($usuario['nome']); ?></td>
                    <td><?= htmlspecialchars($usuario['email']); ?></td>
                    <td><?= htmlspecialchars($usuario['tipousuario']); ?></td>
                    <td>
                        <a href="usuarios-show.php?id=<?= $usuario['id'] ?>">Detalhar</a>
                        <a class="btn-elogio" href="usuarios-edit.php?id=<?= $usuario['id'] ?>">Alterar</a>
                        <a class="btn-outros" href="usuarios-delete.php?id=<?= $usuario['id'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5">Não existem registros cadastrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>

    <tfoot>
        <tr>
            <th colspan="6">
                Total de registros: <?= $count; ?>
            </th>
        </tr>
    </tfoot>
</table>
<?php include 'inc/footer.php'; ?>