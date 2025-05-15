<?php

require_once 'validacao.php';
require_once 'conexao.php';

validar();

$connection = conectar();

$resultado_validacao = mysqli_query($connection, "SELECT * FROM produtos WHERE id = $id");

if (!$resultado_validacao) {
    mysqli_close($connection);

    ?>
    <h2 class="error message">Um produto com o id informado não existe.</h2>
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
    mysqli_close($connection);
    ?>
    <h2 class="error message">Erro ao preparar a consulta ou ao fazer bind.</h2>
    <?php

    die;
}

if(!mysqli_execute($stmt)) {
    mysqli_close($connection);
    
    ?>
    <h2 class="error message">Erro ao executar a consulta</h2>
    <?php

    die;
}
?>

<h2>Produto alterado com sucesso!</h2>

<?php
mysqli_close($connection);