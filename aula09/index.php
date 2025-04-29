<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Home</title>
</head>

<body>
    <a href="clientes.php">Clientes</a>

    <form action="salvar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br>

        <label for="fone">Telefone:</label>
        <input type="text" name="fone" id="fone">
        <br>

        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email">
        <br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>