<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03 - Cliente cadastrado</title>
</head>
<body>
    <a href="index.php">Voltar à página inicial</a>
    
    <h1>Cliente Cadastrado</h1>
    
    <?php 
        if(
            !($_SERVER['REQUEST_METHOD'] == 'POST') ||
            array_search("", $_POST) != false
        ) {
            echo "<h5>Ausência de dados suficientes enviados pela requisição. Tente preencher o formulário inteiro e tente novamente.</h5>";
            return;
        }

        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
    ?>
</body>
</html>