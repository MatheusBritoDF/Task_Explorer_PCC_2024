<?php
require 'restritos.php';
?>

<?php include 'inc/header.php'; ?>

<header class="cabecalho">
    <h1>Relatos</h1>


    <div class="container-login-logout">
        <?php if (verificaSeUsuarioEstaLogado()) : ?>
            <a href="logout.php" class="btn-reclamacao">Logout</a>
        <?php else : ?>
            <a href="login.php" class="btn-outros">Login</a>
        <?php endif; ?>
    </div>
</header>

<?php if (isset($_GET['message'])) : ?>
    <p class="message"><?= $_GET['message']; ?></p>
<?php endif; ?>

<div class="div-create">
    <a href="relatos-create.php?tipo=sugestao" class="btn">Nova sugestão</a>
    <a href="relatos-create.php?tipo=elogio" class="btn btn-elogio">Novo elogio</a>
    <a href="relatos-create.php?tipo=reclamacao" class="btn btn-reclamacao">Nova reclamação</a>
    <?php if (verificaSePerfilDiferenteDeUsuario()) : ?>
        <a href="relatos.php" class="btn btn-outros">Exibir relatos</a>
        <a href="usuarios.php" class="btn btn-usuarios">Usuários</a>
    <?php endif; ?>
</div>

<?php include 'inc/footer.php'; ?>
