<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Parte 02 - Editar</title>
</head>

<body>
    <h2>Aula 09 - Parte 02 - Editar</h2>

    <?php
    require_once 'conexao.php';
    
    $connection = conectar_bd();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id     = $_POST['id'];
        $nome   = $POST['nome'];
        $fone   = $POST['fone'];
        $email  = $POST['email'];

        require_once 'validacao.php';
        verificarDados();

        $sql = "UPDATE Cliente SET nome = ?, fone = ?, email = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt);

        die;
    }

    if (!isset($_GET['id'])) {
        die("Id não informado");
    }

    $id = (int) $_GET['id'];

    $sql = "SELECT * FROM Cliente WHERE id = $id";
    $res = mysqli_query($connection, $sql);

    if (!$cliente = mysqli_fetch_assoc($res)) {
        die("<h2>Cliente inexistente.</h2>");
    }
    ?>

    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" value="<?= $cliente['nome'] ?>"><br><br>

    <label for="fone">Telefone:</label><br>
    <input type="tel" name="fone" id="fone" value="<?= $cliente['fone'] ?>"><br><br>

    <label for="email">E-mail:</label><br>
    <input type="email" name="email" id="email" value="<?= $cliente['email'] ?>"><br><br>

    <input type="hidden" value="<?= $cliente['id'] ?>">

    <input type="submit" value="Editar">
    <?php
    ?>
</body>

</html>