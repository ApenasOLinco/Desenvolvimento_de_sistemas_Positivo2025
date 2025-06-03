<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 13 - Home</title>
</head>

<body>
    <h2>Insira seus dados para continuar</h2>

    <?php
    if (isset($_GET['code'])) {

        $code = (int) $_GET['code'];

        match ($code) {
            0 => $erro = "<h3>Você não tem permissão para acessar essa página.</h3>",

            1 => $erro = "<h3>Credenciais inválidas.</h3>",

            default => $erro = ""
        };

        echo $erro;
    }
    ?>

    <form action="login.php" method="post">
        <p>
            <label for="usuario">Usuario:</label>
            <input id="usuario" name="usuario" type="text">
        </p>
        <p>
            <label for="senha">Senha:</label>
            <input id="senha" name="senha" type="password">
        </p>

        <input type="submit" value="Login">
    </form>
</body>

</html>