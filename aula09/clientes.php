<!DOCTYPE html>
<html lang="en">

<style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 5px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Clientes</title>
</head>

<body>
    <h2>Aula 09 - Clientes</h2>
    <p><a href="index.php">Voltar à home</a></p>

    <?php
    require_once 'conexao.php';

    $conn = conectar_bd();
    $res = mysqli_query($conn, "SELECT * FROM Cliente");
    
    if(mysqli_num_rows($res) === 0) {
        die("Nenhum resultado para a consulta.");
    }
    
    echo '<h3>Lista de Clientes Cadastrados</h3>';
    
    echo '<table border="1">';
    echo "<th>ID #</th>";
    echo "<th>Nome</th>";
    echo "<th>Telefone</th>";
    echo "<th>E-mail</th>";
    echo "<th>Ações</th>";
    
    while ($linha = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $linha['id'] . "</td>";
        echo "<td>" . $linha['nome'] . "</td>";
        echo "<td>" . $linha['fone'] . "</td>";
        echo "<td>" . $linha['email'] . "</td>";
        echo '
        <td>
            <a href="excluir.php?id=' . $linha['id'] . '">Excluir</a> |
            <a href="editar.php?id=' . $linha['id'] . '">Editar</a>
        </td>';
        echo "</tr>";
    }
    
    echo '</table>';
    
    mysqli_close($conn);
    ?>
</body>

</html>