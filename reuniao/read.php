<?php
    require_once "../util/config.php";
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "SELECT idreuniao, titulo, contato_idcontato, nome from reuniao, contato where contato_idcontato = idcontato and idreuniao = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);
    }
?>
<html lang="pt-br">
<head>
    <title>Detalhes da Reunião</title>
</head>
<body>
    <h2>Detalhes da Reunião</h2>
    <p>Nome: <?php echo($row['nome']) ?></p>
    <p>Titulo: <?php echo($row['titulo']) ?></p>
</body>
</html>