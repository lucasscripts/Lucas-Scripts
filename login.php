<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require 'includes/db.php';
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $sql = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
  $sql->execute([$email, $senha]);
  if ($sql->rowCount() > 0) {
    $_SESSION['user'] = $sql->fetch();
    header('Location: dashboard.php');
  } else {
    echo 'Login inválido';
  }
}
?>
<form method="post">
  Email: <input type="email" name="email"><br>
  Senha: <input type="password" name="senha"><br>
  <input type="submit" value="Entrar">
</form>