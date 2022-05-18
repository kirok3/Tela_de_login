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
if($_SERVER['REQUEST_METHOD'] == "POST"){        
    $titulo = $_POST["titulo"];
    $contato = $_POST["contato"];
    $id = $_POST["id"];
    $sql = "UPDATE reuniao SET titulo = ?, contato_idcontato = ?  WHERE idreuniao = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sii", $titulo, $contato, $id);
    if(mysqli_stmt_execute($stmt)){
        header('location: index.php');
        exit;
    } else {
        echo "Ocorreu um erro";
    }
}
$sql_contato = "SELECT * FROM contato";
$result_contato = mysqli_query($link, $sql_contato);

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar reuniao</title>
</head>
<body>
    <h2>Alteração de reunião</h2>
    <form method="post" action="update.php">
        <p>titulo:<input type="text" name="titulo" 
            value="<?php echo $row['titulo'] ?>"></p>
            <p>contato : <select name="contato">
            <?php while ($row_contato = mysqli_fetch_array($result_contato)){ ?>
            <option 
            <?php if($row['contato_idcontato'] == $row_contato['idcontato']){echo "selected";}?>

            value="<?php echo ($row_contato['idcontato']) ?>">
                    <?php echo ($row_contato['nome']) ?></option><?php } ?></select></p>

        <input type="hidden" name="id" value="<?php echo $row['idreuniao'] ?>">
        <p><input type="submit" value="Gravar"></p>
    </form>
    <p><a href='index.php'>Voltar</a></p>
</body>
</html>