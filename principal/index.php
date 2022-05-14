<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela principal</title>
</head>
<body>
    <p> Bem vindo : <?php echo $_SESSION['nome'] ?></p>
</body>
</html>