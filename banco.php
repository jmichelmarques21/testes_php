<?php

//criação do banco de dados
$banco = new mysqli("localhost:3307", "root", "", "banco_teste");

// if($banco->connect_errno){
//   echo "Erro ao acessar o banco de dados...";
//   die();
// } else {
//   echo "Banco acessado com sucesso!";
// }

// função de cadastro de novo usuário no banco
function adicionarUsuario($usuario, $nome, $senha, $confirmaSenha)
{
  if ($senha == $confirmaSenha) {
    global $banco;
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $q = "INSERT INTO usuarios(usuario, nome, senha) VALUES ('$usuario', '$nome', '$senha')";
    $banco->query($q);
    echo "Usuário cadastrado com sucesso!";
    header("Location: inicio.php");
  } else {
    echo "As senhas informadas são diferentes...";
  }
}

// função de verificação de existência do usuário (para evitar registros duplicados)
function verificarUsuario($usuario)
{
  global $banco;

  $q = "SELECT COUNT(*) FROM usuarios WHERE usuario = ?";
  $retorno = $banco->prepare($q);
  $retorno->bind_param("s", $usuario);
  $retorno->execute();
  $retorno->bind_result($count);
  $retorno->fetch();
  $retorno->close();

  return $count > 0;
}

// função para fazer login
function logar($usuario, $senha)
{
  global $banco;
  $q = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
  $busca = $banco->query($q);

  if ($busca->num_rows > 0) {
    $objUsuario = $busca->fetch_object();

    if (password_verify($senha, $objUsuario->senha)) {
      session_start();
      $_SESSION["usuario"] = $objUsuario->usuario;
      $_SESSION["nome"] = $objUsuario->nome;
      header("Location: inicio.php");
      exit();
    } else {
      echo "Usuário ou senha inválidos.";

    }
  }
}

// função para deslogar
function deslogar()
{
  session_start();
  session_destroy();
  header("Location: index.php");
  exit();

}





?>