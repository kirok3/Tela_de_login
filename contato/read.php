<?php
    require_once "../util/config.php";
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "SELECT * FROM contato WHERE idcontato = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);
    }
?>
<html lang="pt-br">
<head>
    <title>Detalhes do Contato</title>
</head>
<body>
    <h2>Detalhes do Contato</h2>
    <p>Nome: <?php echo($row['nome']) ?></p>
    <p>Telefone: <?php echo($row['telefone']) ?></p>
    <p>Endereço: <?php echo($row['endereco']) ?></p>
</body>
</html>