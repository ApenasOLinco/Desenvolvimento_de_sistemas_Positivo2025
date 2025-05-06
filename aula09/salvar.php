<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Salvar</title>
</head>

<body>
    <p>
        <a href="index.php">Voltar à home</a>
    </p>

    <?php
    require_once 'conexao.php';
    require_once 'validacao.php';

    verificarDados();

    $nome  = $_POST['nome'];
    $fone  = $_POST['fone'];
    $email = $_POST['email'];

    $conn = conectar_bd();

    $stmt = mysqli_prepare($conn, "
        INSERT INTO Cliente (nome, fone, email)
        VALUES (?, ?, ?)
    ");

    if (!$stmt) {
        die("Erro na preparação do statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sss", $nome, $fone, $email);

    if(mysqli_execute($stmt)) {
        echo "<h2>Cliente salvo com sucesso!</h2>";
    } else {
        die("<h2>Erro ao salvar cliente: " . mysqli_error($conn) . "</h2>");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>
</body>

</html>