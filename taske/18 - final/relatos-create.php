<?php
date_default_timezone_set('America/Sao_Paulo');
$dataAbertura = date('d/m/Y');

$tipo = $_GET['tipo'] ?? '';

if ($tipo === 'sugestao') {
    $tipoRelato = 'Sugestão';
} elseif ($tipo === 'reclamacao') {
    $tipoRelato = 'Reclamação';
} else {
    $tipoRelato = 'Elogio';
    $tipo = 'elogio';
}
?>
<?php include 'inc/header.php'; ?>

<h1>Novo Relato - <span class=""><?= $tipoRelato; ?></span></h1>

<hr>

<form action="relatos-save.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="0">
    <input type="hidden" name="tipo" value="<?= $tipo; ?>">
    <ul>
        <li>
            <h2>Data de Abertura</h2>
            <p>
                <?= $dataAbertura; ?>
            </p>
        </li>
        <li>
            <h2>Título</h2>

            <p>
                <input class="form-controle" type="text" name="titulo" placeholder="Informe o título do relato." required autofocus>
            </p>
        </li>

        <li>
            <h2>Descrição</h2>

            <p>
                <textarea class="form-controle" name="descricao" cols="30" rows="10" placeholder="Informe a descrição do relato." required></textarea>
            </p>
        </li>

        <?php if ($tipoRelato === 'Reclamação') : ?>
            <li>
                <h2>Anexo</h2>

                <p>
                    <input class="form-controle" type="file" name="anexo" placeholder="Adicione um anexo ao relato se necessário.">
                </p>
            </li>
        <?php endif; ?>
    </ul>

    <br>
    
    <div class="div-button">
        <button class="btn">Enviar</button>
        <a class="btn btn-voltar" href="index.php">Voltar</a>
    </div>
</form>

<?php include 'inc/footer.php'; ?>
