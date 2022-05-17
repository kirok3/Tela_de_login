<?php
    session_start();
    require_once "../utill/config.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        
    $sql = "SELECT * FROM usuario WHERE login = ? AND senha = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $login, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    
    if(mysqli_num_rows($result) > 0){
        header('Location: ../principal/index.php');
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['login'] = $row['login'];
        $_SESSION['senha'] = $row['senha'];
    
    } else{
        echo "Usuario ou senha inválido";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
</head>
<body>
    <h2>Informe seus Dados</h2>
    <form method="POST">
        <P>Login: <input type="text" name = "login"></P>
        <P>senha: <input type="text" name = "senha"></P>
        <p><input type="submit" value="Entrar"></p>
    </form>
</body>
</html>