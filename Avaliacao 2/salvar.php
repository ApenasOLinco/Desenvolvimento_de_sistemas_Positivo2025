<?php
require_once "conexao.php";
require_once "validacao.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <a href="index.php">Home</a>

    <h2>Salvar produto</h2>

    <?php

    validar();

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $connection = conectar();

    $sql = "
        INSERT INTO produtos
        (nome, preco, quantidade)
        VALUES
        (?, ?, ?)
    ";


    $stmt = mysqli_prepare($connection, $sql);

    if (
        !mysqli_stmt_bind_param(
            $stmt,
            "sdi",
            $nome,
            $preco,
            $quantidade
        )
    ) {
        mysqli_close($connection);
        die("Erro inesperado ao processar os dados para inserção.");
    }

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_close($connection);
        die("Erro ao executar o SQL");
    }

    echo "<h3>Produto cadastrado com sucesso!</h3>";
    mysqli_close($connection);
    ?>
</body>

</html>