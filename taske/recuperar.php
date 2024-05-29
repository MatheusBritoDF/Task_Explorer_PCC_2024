<form action="recuperar_senha.php" method="POST">
    <link rel="stylesheet" href="css/style-rec1.css">
    <div class="container">
    <div class="box">
	<h4>Recuperar Senha</h4>
	<label>Insira o email cadastrado</label><br><br>
	<input type="email" name="email" placeholder="Insira seu email" required><br><br>
	<!--<code>Insira o email e receba o código!</code><br><br>-->
    <div>
    <input type="submit" value="Enviar" class="btn">
    </div>
     <a href="index.php"><img src="img/task.png" alt="task" class="image"></a> 
	<input type="hidden" name="env" value="form">
    </div>
    </div>
</form>
