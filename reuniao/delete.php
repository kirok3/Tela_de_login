<?php
    require_once "../util/config.php";
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "DELETE FROM reuniao WHERE idreuniao = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)){
            echo "<p>Registro Excluido</p>";
        } else {
            echo "<p>Não foi possivel excluir</p>";
        }
        echo "<a href='index.php'>Voltar</a>";
    }


?>