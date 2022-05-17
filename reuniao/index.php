<?php 
    require_once "../util/config.php";

    $sql = "SELECT idreuniao, titulo, contato_idcontato, nome FROM reuniao, contato WHERE contato_idcontato = idcontato ORDER BY titulo";
    $result = mysqli_query($link, $sql);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exibir reuniões</title>
</head>
<body>
    <h2>Lista de reuniões</h2>
    <p><a href="create.php">Incluir</a></p>
    <table border="1">
        <tr>
            <td>Id</td><td>Titulo</td><td>contato</td>
            <td colspan="3">Ações</td>
        </tr>
        <?php while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo($row['idreuniao']) ?></td>
            <td><?php echo($row['titulo']) ?></td>
            <td><?php echo($row['nome']) ?></td>
            <td><?php echo('<a href="read.php?id='.
            $row['idreuniao'].'">Exibir</a>') ?></td>

            <td><?php echo('<a href="update.php?id='.
            $row['idreuniao'].'">Alterar</a>') ?></td>
            
            <td><?php echo('<a href="delete.php?id='.
            $row['idreuniao'].'">Excluir</a>') ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>