<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Parte 02</title>
</head>

<body>
    <p>
        <a href="index.php">Voltar à home</a> | <a href="clientes.php">Voltar à lista de clientes</a>
    </p>

    <?php 
    require_once 'conexao.php';

    if(!isset($_GET['id'])) {
        die("Id não informado");
    }
    
    $id = (int) $_GET['id'];

    $conn = conectar_bd();
    $sql = "DELETE FROM Cliente WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        die("<h3>Erro na preparação do statement.</h3>");
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    if(!mysqli_stmt_execute($stmt)) {
        die("<h3>Erro ao excluir cliente: " . mysqli_stmt_error($stmt) . "</h3>");
    }
    
    if(mysqli_affected_rows($conn) === 0) {
        die("<h3>Cliente inexistente</h3>");
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    echo "<h3>Cliente excluído com sucesso!</h3>";
    
    ?>
</body>

</html>