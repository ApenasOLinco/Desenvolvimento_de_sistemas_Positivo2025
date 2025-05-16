<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Excluir Produto</title>
</head>

<body>
    <h1>Excluir produto</h1>

    <?php
    require_once 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] != "GET") {
        ?>
        <p class="error message">Método de requisição inválido.</p>
        <?php
    }

    if (empty($_GET['id'])) {
        ?>
        <p class="error message">Id não fornecido</p>
        <?php
    }
    $id = $_GET['id'];

    $connection = conectar();

    $sql = "DELETE FROM produtos WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        fecharConexao($stmt, "i");

        ?>
        <p class="error message">Erro ao preparar o statement.</p>
        <?php

        die;
    }

    if (!mysqli_stmt_bind_param($stmt, "i", $id)) {
        fecharConexao($connection, $stmt);

        ?>
        <p class="error message">Erro ao bindar parâmetros.</p>
        <?php

        die;
    }

    if (!mysqli_stmt_execute($stmt)) {
        fecharConexao($connection, $stmt);

        ?>
        <p class="error message">Erro ao excluir produto.</p>
        <?php

        die;
    }

    if (mysqli_affected_rows($connection) == 0) {
        fecharConexao($connection, $stmt);

        ?>
        <p class="error message">O produto de id <?= $id ?> não existe.</p>
        <?php

        die;
    }

    ?>
    <p class="success message">Produto excluido com sucesso.</p>
    <?php fecharConexao($connection, $stmt); ?>

</body>

</html>