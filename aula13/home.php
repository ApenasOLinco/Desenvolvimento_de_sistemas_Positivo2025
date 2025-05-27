<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 13 - Home</title>
</head>

<body>
    <h2>Aula 13 - Home</h2>
    <h3>Bem-vindo, <?= $_SESSION['usuario']; ?>!</h3>

    <a href="logout.php">Fazer logout</a>
</body>

</html>