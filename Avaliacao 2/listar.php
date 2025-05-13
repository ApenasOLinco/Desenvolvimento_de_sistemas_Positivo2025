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

    <h2>Produtos cadastrados</h2>

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

            if(!$result) {
                mysqli_close($connection);
                die("Erro ao recuperar dados do banco: " . mysqli_error($connection));
            }
            
            mysqli_close($connection);
            
            while($next = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                    <td><?=$next["id"]?></td>
                    <td><?=$next["nome"]?></td>
                    <td><?="R$" . number_format($next["preco"], 2)?>
                    <td><?=$next["quantidade"]?></td>
                </tr>

                <?php
            }
            
            ?>
        </tbody>
    </table>
</body>
</html>