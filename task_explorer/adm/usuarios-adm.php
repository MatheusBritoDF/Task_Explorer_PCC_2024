<?php
require_once 'usuarios.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 
    $tipo_usuario = $_POST['tipo_usuario'];
    adicionarUsuario($nome, $email, $senha, $tipo_usuario);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];
    editarUsuario($id, $nome, $email, $senha, $tipo_usuario);
}


if (isset($_POST['excluir'])) {
    $id = $_POST['excluir'];
    excluirUsuario($id);
}


$usuarios = listarUsuarios();
?>


<!DOCTYPE html>
<html lang="pt-br" class="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/sidebar23.css">
    <link rel="stylesheet" href="../css/styleg1.css">
    <link rel="stylesheet" href="../css/usuarios-adm.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/task.png">
    <title>Início</title>
</head>

<style>
table {
    width: 83%;
    border-collapse: collapse;
    margin-top: 10px;
}

th,
td {
    border: 3px solid #fff;
    text-align: left;
}

form {
    margin-bottom: 20px;
}
</style>


<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-details">
            <img src="../img/taske2-andre-lindo.png" alt="">
            <span class="logo_name">Task Explorer</span>
        </div>
        <ul class="nav-links">

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="../homepage.html">
                        <i class='bx bxs-home'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Home</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="../suporte.html">
                        <i class='bx bx-help-circle'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Suporte</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="iocn-links">
                    <a class="link_as_button" href="administrador.php">
                        <i class='bx bx-home'></i>
                        <!--Logo do inicio-->
                        <span class="link_name">Retornar</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <!-- FIM SIDEBAR -->

    <h1 class="h1">Gerenciamento de Usuários</h1>
    <br>
    <h2 class="h2">Adicionar Usuário</h2>
    <form method="POST" class="form">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required placeholder="Insira o nome">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Insira o email">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required placeholder="Insira a senha">
        <label for="tipo_usuario">Tipo de Usuário:</label>
        <select id="tipo_usuario" name="tipo_usuario" required
            style="background:#21244a; color:#ccc; height: 30px; border-radius: 3px; margin-top:5px;">

            <option value="Usuário" style="color:#ccc;">Usuário</option>
            <option value="Administrador" style="color:#ccc;">Administrador</option>
        </select>
        <button type="submit" name="adicionar" class="btn-ad">Adicionar</button>
    </form>

    <h2 class="listagem">Listagem de Usuários</h2>
    <table class="container">
        <thead class="box">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo de Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody class="registros">
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id_usuario']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['tipo_usuario']; ?></td>
                <td>
                    <!-- <form method="POST" style="display: inline-block;">
                            <input type="hidden" name="excluir" value="<?php echo $usuario['id_usuario']; ?>">
                            <button type="submit" class="btn">Excluir</button>
                        </form> -->
                    <form method="POST" style="display: inline-block;">
                        <input type="hidden" style="widht:100px;" name="id"
                            value="<?php echo $usuario['id_usuario']; ?>">
                        <input type="text" name="nome" placeholder="Novo nome" required>
                        <input type="email" name="email" placeholder="Novo email" required>
                        <input type="password" name="senha" placeholder="Nova senha">
                        <select name="tipo_usuario" required
                            style="background:#21244a; color:#ccc; height: 30px; border-radius: 3px;">
                            <option value="Usuário" style="color:#ccc;"
                                <?php if ($usuario['tipo_usuario'] == 'Usuário') echo 'selected'; ?>>Usuário</option>
                            <option value="Administrador" style="color:#ccc;"
                                <?php if ($usuario['tipo_usuario'] == 'Administrador') echo 'selected'; ?>>Administrador
                            </option>
                        </select>
                        <button type="submit" name="editar" class="btn" onclick="return confirmarEdicao();">Editar</button>
                    </form>
                    <form method="POST" style="display:inline-block;">
                        <input type="hidden" name="excluir" value="<?php echo $usuario['id_usuario']; ?>">
                        <button type="submit" class="btn-excluir" onclick="return confirmarExclusao();">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function confirmarExclusao() {
            var resposta = confirm("Você realmente deseja excluir este Usuário?");
            if (resposta) {
                alert("Usuário excluído com sucesso!"); // Mensagem opcional de sucesso
                window.location.href = 'quadros-adm.php'; // Redireciona após exclusão
                return true;
            } else {
                alert("Exclusão cancelada.");
                return false;
            }
        }

        function confirmarEdicao() {
            var resposta = confirm("Você realmente deseja editar este Usuário?");
            if (resposta) {
                alert("Usuário editado com sucesso!"); // Mensagem opcional de sucesso
                window.location.href = 'quadros-adm.php'; // Redireciona após exclusão
                return true;
            } else {
                alert("Edição cancelada.");
                return false;
            }
        }
    </script>

</body>

</html>