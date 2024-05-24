<?php
include 'models/database/database.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn =  Database::getConexao();

    $query = 'SELECT * FROM ouvir_etc_db.usuarios 
        WHERE email = :email AND password = :password;';
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$usuario) {
        header('Location: login.php?message=Usuário ou senha inválidos.');
        exit();
    }

    $_SESSION['usuario'] = [
        'nome' => $usuario['nome'],
        'tipo' => $usuario['tipousuario'],
    ];
    header('Location: index.php');
    exit();
}
?>
<?php include 'inc/header.php'; ?>

<h1>Login</h1>

<form action="" method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" placeholder="Informe o e-mail." required autofocus>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Informe sua senha." required>
    <button name="login" class="btn">Login</button>
    <a href="index.php" class="btn btn-voltar">Voltar</a>
</form>

<?php include 'inc/footer.php'; ?>
