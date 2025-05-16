<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <h1>Salvar produto</h1>
    
    <?php
    require_once 'validacao.php';
    require_once 'conexao.php';

    validar();

    $connection = conectar();

    $id = $_POST["id"];

    $resultado_validacao = mysqli_query($connection, "SELECT * FROM produtos WHERE id = $id");

    if (!$resultado_validacao) {
        mysqli_close($connection);

        ?>
        <p class="error message">Um produto com o id informado não existe.</p>
        <?php

        die;
    }

    $sql = "
        UPDATE produtos
        SET
            nome = ?,
            preco = ?,
            quantidade = ?
        WHERE
            id = ?
    ";

    $stmt = mysqli_prepare($connection, $sql);
    $bind = mysqli_stmt_bind_param(
        $stmt,
        "sdii",
        $_POST["nome"],
        $_POST["preco"],
        $_POST["quantidade"],
        $_POST["id"]
    );

    if (!$stmt || !$bind) {
        fecharConexao($connection, $stmt);
        ?>
        <p class="error message">Erro ao preparar a consulta ou ao fazer bind.</p>
        <?php

        die;
    }

    if (!mysqli_execute($stmt)) {
        fecharConexao($connection, $stmt);

        ?>
        <p class="error message">Erro ao executar a consulta</p>
        <?php

        die;
    }
    ?>

    <p class="success message">Produto alterado com sucesso!</p>

    <?php
    fecharConexao($connection, $stmt);
    ?>

</body>

</html>