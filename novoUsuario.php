<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página inicial</title>
</head>

<body>
  <h3>Faça o seu cadastro: </h3>
  <form action="" method="post">
    <label for="">Nome de usuário: </label><br>
    <input type="text" name="usuario"><br>
    <label for="">Nome: </label><br>
    <input type="text" name="nome"><br>
    <label for="">Senha: </label><br>
    <input type="password" name="senha"><br>
    <label for="">Confirme a sua senha: </label><br>
    <input type="password" name="confirmaSenha"><br>
    <button type="submit">Cadastrar</button><br>

    <?php

    require_once "banco.php";
    $erro = '';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $usuario = $_POST['usuario'] ?? '';
      $nome = $_POST['nome'] ?? '';
      $senha = $_POST['senha'] ?? '';
      $confirmaSenha = $_POST['confirmaSenha'] ?? '';

      if (!empty($usuario) && !empty($nome) && !empty($senha) && !empty($confirmaSenha)) {
        if (verificarUsuario($usuario)) {
          $erro = "Nome do usuário já existe. Por favor, escolha outro.";
          echo $erro;
        } else {
          if ($senha === $confirmaSenha) {
            adicionarUsuario($usuario, $nome, $senha, $confirmaSenha);
          } else {
            $erro = "Preencha todos os campos.";
            echo $erro;
          }
        }
      }
    }

    ?>
</body>

</html>