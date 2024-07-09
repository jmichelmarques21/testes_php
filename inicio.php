<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela Inicial</title>
</head>

<body>


  <?php
  session_start();
  if (isset($_SESSION['usuario'])) {
    echo "<h1>Bem-vindo(a), " . $_SESSION['nome'] . " (" . $_SESSION['usuario'] . ")!</h1>";
    echo '<a href="logout.php">Clique aqui para deslogar</a>';
  } else {
    header("Location: index.php");
    exit();
  }


  ?>


</body>

</html>