<?php require_once "conexao.php";

use Dom\Document; ?>

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

    <?php
    $connection = conectar();

    $sql = "SELECT * FROM produtos";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        mysqli_close($connection);
        die("Erro ao recuperar dados do banco: " . mysqli_error($connection));
    }

    mysqli_close($connection);
    ?>


    <p class="tip message">
        <b>Dica</b>: clique em uma entrada da tabela para editá-la.
    </p>

    <p class="warn message">
        <b>Atenção</b>: note que alterações <b>não</b> são salvas automaticamente.
    </p>

    <dialog id="editarDialog">
        <button class="close-dialog" onclick="editarDialog.close()">x</button>
        <iframe name="editar-iframe" src="about:blank"></iframe>
    </dialog>

    <table>
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Editar</th>
        </thead>
        <tbody>
            <?php
            while ($produto = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                    <form action="editar.php" method="post" target="editar-iframe" onsubmit="editarDialog.showModal()">

                        <input type="hidden" value=<?= $produto["id"] ?> name="id">

                        <td>
                            <?= $produto["id"] ?>
                        </td>

                        <td>
                            <input name="nome" type="text" value="<?= $produto["nome"] ?>" class="campo-editavel">
                        </td>

                        <td>
                            <input name="preco" type="text" value="<?= number_format($produto["preco"], 2) ?>"
                                class="campo-editavel">
                        </td>

                        <td>
                            <input name="quantidade" type="number" value="<?= $produto["quantidade"] ?>"
                                class="campo-editavel">
                        </td>

                        <td class="td-editar">
                            <input type="submit" value="Salvar" class="editar-acao">
                            <a  href="excluir.php?id='<?= $produto["id"] ?>'"
                                target="editar-iframe"
                                onclick="editarDialog.showModal()"
                                class="editar-acao"
                                >Excluir
                            </a>
                        </td>
                    </form>
                </tr>

                <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>