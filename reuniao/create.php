<?php
    require_once "../util/config.php";
    //so vai executar se for acionado o metodo post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $titulo = $_POST["titulo"];
        $contato = $_POST["contato"];

        $sql = "INSERT INTO reuniao (titulo, contato_idcontato) VALUES (?, ?)";

        $stmt = mysqli_prepare($link, $sql);

        mysqli_stmt_bind_param($stmt, "si", $titulo, $contato);

        if(!mysqli_stmt_execute($stmt)){
            echo "Ocorreu um erro";
        }
    }
    $sql = "SELECT * FROM contato";
    $result = mysqli_query($link, $sql);
    ?>
<html>
    <head>
        <title>Cadastro de reuniôes</title>
    </head>
    <body>
        <h2>Cadastro de Reuniôes</h2>
        <form method="post" action="create.php">
            <p>titulo : <input type="text" name="titulo"></p>
            <p>contato : <select name="contato">
            <?php while ($row = mysqli_fetch_array($result)){ ?>
            <option value="<?php echo ($row['idcontato']) ?>">
                    <?php echo ($row['nome']) ?></option><?php } ?></select></p>
            <p><input type="submit" value="gravar"></p>
        </form>
    </body>
</html>