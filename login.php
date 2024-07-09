<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h3>Faça o seu login: </h3>
  <form action="" method="post">
    <label for="">Usuário: </label><br>
    <input type="text" name="usuario"><br>
    <label for="">Senha: </label><br>
    <input type="password" name="senha"><br>
    <button type="submit">Entrar</button><br>
  </form>

  <?php

  require_once "banco.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (!empty($usuario) && !empty($senha)) {
      logar($usuario, $senha);
    } else {
      echo "Por favor, preencha todos os campos!";
    }
  }


  ?>

</body>

</html>