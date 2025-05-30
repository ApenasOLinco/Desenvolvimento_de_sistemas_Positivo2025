<?php

use Dba\Connection;
require_once "conexao.php";
require_once "validacao.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Produto</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <a href="index.php">Home</a>

    <h1>Salvar produto</h1>

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
        !$stmt ||
        !mysqli_stmt_bind_param(
            $stmt,
            "sdi",
            $nome,
            $preco,
            $quantidade
        )
    ) {
        fecharConexao($connection, $stmt);
        die("Erro inesperado ao processar os dados para inserção.");
    }

    echo "<h2>Salvando o produto... se nenhuma mensagem for exibida após esta, o processo falhou.</h2>";

    if (!mysqli_stmt_execute($stmt)) {
        fecharConexao($connection, $stmt);
        die("Erro ao executar o SQL");
    }

    ?>

    <p class="success message">Produto cadastrado com sucesso!</p>

    <?php fecharConexao($connection, $stmt); ?>
</body>

</html>