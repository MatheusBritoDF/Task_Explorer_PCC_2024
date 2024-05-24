<?php include 'inc/header.php'; ?>

<h1>Novo Usuário</h1>

<hr>

<form action="usuarios-save.php" method="post">
    <input type="hidden" name="id" value="0">
    <ul>
        <li>
            <h2>Nome</h2>

            <p>
                <input class="form-controle" type="text" name="nome" placeholder="Informe o nome do usuário." required autofocus>
            </p>
        </li>

        <li>
            <h2>E-mail</h2>

            <p>
                <input class="form-controle" type="email" name="email" placeholder="Informe o e-mail do usuário." required>
            </p>
        </li>

        <li>
            <h2>Status</h2>

            <p>
                <select name="status" class="form-controle">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </p>
        </li>

        <li>
            <h2>Tipo</h2>

            <p>
                <select name="tipo" class="form-controle">
                    <option value="1">Administrador</option>
                    <option value="2">Usuário</option>
                    <option value="3">Analista</option>
                </select>
            </p>
        </li>

        <li>
            <h2>Password</h2>
            <p>
                <input type="password" name="password" class="form-controle" required placeholder="Informe a senha do usuário.">
            </p>
        </li>
    </ul>

    <br>
    <button class="btn">Enviar</button>
    <a class="btn btn-voltar" href="usuarios.php">Voltar</a>
</form>

<?php include 'inc/footer.php'; ?>
