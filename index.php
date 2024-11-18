<?php
require 'conexao.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['Senha'];

    $sql = "SELECT * FROM cadastro WHERE email_usuario	 = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['senha_usuario'])) {
        $_SESSION['idCadastro	'] = $user['id'];
        echo "Login realizado com sucesso!";
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="background">
        <div class="logo">
            <img src="LOGO.png">
        </div>
        <div class="container">
            <form class="formulario" action="portfolio.html" method="POST">
                <h1>Login</h1>
                
                <div class="input-group">
                    <label for="email">E-mail *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha *</label>
                    <input type="password" id="password" name="Senha" required>
                </div>
                
                <div class="input-button">
                    <input type="submit" value="Login" class="button" >
                </div>
                <div class="input-login">
                    <a href="e_senha.php">Esqueci a senha > </a>
                </div>
                <div class="input-login">
                    <a href="cadastro.php">Criar uma conta > </a>
                </div>
            </form>
        </div>
       </div>
       <div class="input-p">
        <p>2024. QUEM_INDICA. </p> 
       <a href="creditos.pdf" style="color: white;">CREDITOS.</a> 
       <a href="termos-de-privacidade.pdf" style="color: white;">TERMOS DE PRIVACIDADE. </a> </div>
</body>
</html>



