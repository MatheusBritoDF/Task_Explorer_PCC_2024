<?php
require 'restritos.php';
include 'models/database/database.php';

if (verificaSePerfilDiferenteDeUsuario() == false) {
    header('location: index.php?message=Acesso restrito. Faça o login');
    exit();
}

$conn =  Database::getConexao();

$query = 'SELECT * FROM ouvir_etc_db.relatos ORDER BY dataabertura desc, tipo;';
$stmt = $conn->query($query);
$relatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = 0;
?>
<?php include 'inc/header.php'; ?>


<h1>Relatos</h1>

<table>
    <thead>
        <th>#</th>
        <th>Data de Abertura</th>
        <th>Tipo</th>
        <th>Status</th>
        <th>Título</th>
        <th>Ação</th>
    </thead>

    <tbody>
        <?php if ($relatos) : ?>
            <?php foreach ($relatos as $relato) :
                $count++; ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= htmlspecialchars($relato['dataabertura']); ?></td>
                    <td><?= htmlspecialchars($relato['tipo']); ?></td>
                    <td><?= htmlspecialchars($relato['status']); ?></td>
                    <td><?= htmlspecialchars($relato['titulo']); ?></td>
                    <td>
                        <a href="relatos-show.php?id=<?= $relato['id'] ?>">Visualizar</a>
                        <?php if($relato['status'] == 'ABERTA' || $relato['status'] == 'PENDENTE'):?>
                            <a class="btn-outros" href="relatos-resposta.php?id=<?= $relato['id'] ?>">Responder</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Não existem registros cadastrados.</td>
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
