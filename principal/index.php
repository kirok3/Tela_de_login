<?php
    session_start();
    if((!isset($_SESSION['login']) == true) && (!isset($_SESSION['senha']) == true)){
        header('location: ../login/index.php');
    }
    if(isset($_GET['sair'])){
        session_destroy();
        header('location: ../login/index.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela principal</title>
</head>
<body>
    <p> Bem vindo : <?php echo $_SESSION['nome'] ?></p>
    <ul>
    <li><a href="../contato/index.php"> Gerenciar Contatos</a></li>
    <li><a href="../reuniao/index.php"> Gerenciar Reunioês</a></li>
    <li><a href="index.php?sair=true">sair</a></li>
    </ul>
</body>
</html> 