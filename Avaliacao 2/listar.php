<?php require_once "conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos cadastrados</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <a href="index.php">Home</a>

    <h1>Produtos cadastrados</h1>
    <p class="tip-text">
        <b>Dica</b>: clique em uma entrada da tabela para editá-la.
    </p>

    <table>
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </thead>
        <tbody>
            <?php
            $connection = conectar();

            $sql = "SELECT * FROM produtos";

            $result = mysqli_query($connection, $sql);

            if (!$result) {
                mysqli_close($connection);
                die("Erro ao recuperar dados do banco: " . mysqli_error($connection));
            }

            mysqli_close($connection);

            while ($next = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                    <td>
                        <input type="text" value=<?= $next["id"] ?> class="campo-editavel">
                    </td>

                    <td>
                        <input type="text" value=<?= $next["nome"] ?> class="campo-editavel">
                    </td>

                    <td>
                        <input type="text" value=<?= number_format($next["preco"], 2) ?> class="campo-editavel">
                    </td>

                    <td>
                        <input type="number" value=<?= $next["quantidade"] ?> class="campo-editavel">
                    </td>
                </tr>

                <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>