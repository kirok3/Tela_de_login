<?php

    require_once "../util/config.php";
    
    $nome = "joão";
    $telefone = "(91) 985451254154";
    $endereco = "rua machado de assis, 1020";
    

    $sql = "INSERT INTO contato (nome, telefone, endereco) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nome, $telefone, $endereco);
    if(mysqli_stmt_execute($stmt)){
        echo "Registro inserido";

    } else {
        echo "ocorreu um erro";

    }

?>