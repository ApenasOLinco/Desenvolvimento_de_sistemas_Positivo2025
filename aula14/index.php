<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 14 - Home</title>
</head>

<body>
    <h1>Aula 14 - Home</h1>
    <h2>Relacionamento entre tabelas</h2>

    <h3>Pesquisa de pedidos por E-Mail de Cliente</h3>
    <form action="index.php" method="post">
        <label for="email">Informe o e-mail do cliente:</label>
        <input type="email" name="email" id="email">

        <input type="submit" value="Pesquisar">
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        exit;
    }

    if (empty($_POST['email'])) {
        exit;
    }

    $email = $_POST['email'];

    require_once 'conexao.php';
    $conn = db_connect();

    $sql =
    "SELECT
        cl.nome, cl.email, pd.produto, pd.valor 
    FROM 
        pedidos pd
    INNER JOIN clientes cl
    ON pd.cliente_id = cl.id
    WHERE email LIKE ?
    ";

    $stmt = mysqli_prepare($conn, $sql);

    if(!$stmt) {
        exit("<h3>Erro na estrutura da consulta SQL.</h3>");
    }

    if(!mysqli_stmt_bind_param($stmt, "s", $email)) {
        exit("<h3>Erro ao associar e-mail ao parâmetro de pesquisa.</h3>");
    }

    mysqli_execute($stmt);

    mysqli_stmt_store_result($stmt);
    $linhas = mysqli_stmt_num_rows($stmt);

    if ($linhas <= 0) {
        exit("<h3>Nenhum pedido associado ao cliente com e-mail $email</h3>");
    }

    echo "<h3>Pedidos do cliente: $email</h3>";
    mysqli_stmt_bind_result($stmt, $nome, $email, $produto, $valor);

    while(mysqli_stmt_fetch($stmt)) {
        
        echo "Cliente: " . $nome . "<br>";
        echo "E-mail: " . $email . "<br>";
        echo "Produto: " . $produto . "<br>";
        echo "Valor: R$" . $valor . "<br>";
        echo "-----------------------------------------<br>";
        
    }   

    mysqli_close($conn);

    ?>
</body>

</html>