<?php
require 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $sql = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
  $sql->execute([$email, $senha]);
  echo 'Cadastro realizado. <a href="login.php">Entrar</a>';
}
?>
<form method="post">
  Email: <input type="email" name="email"><br>
  Senha: <input type="password" name="senha"><br>
  <input type="submit" value="Cadastrar">
</form>