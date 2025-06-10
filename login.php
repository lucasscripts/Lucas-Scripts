<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'includes/db.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $sql->execute([$email]);
    $user = $sql->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Login inválido';
    }
}
?>

<form method="post">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <input type="submit" value="Entrar">
</form>
