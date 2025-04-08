<?php require_once 'functions.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 06 - Cálculos</title>
</head>

<body>
    <h1>Aula 06 - Cálculos</h1>
    <?php
    if (!validar_form()) {
        echo 'Não post';
        die;
    }

    if(!verificar_campos_em_branco()) {
        echo 'Existem campos em branco.';
        die;
    }

    if(!verificar_valor_numerico()) {
        echo 'Foram enviados valores não numéricos.';
        die;
    }

    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    
    $soma = $valor1 + $valor2;
    $subt = $valor1 - $valor2;
    $mult = $valor1 * $valor2;
    $divi = $valor2 == 0 ? 0 : $valor1 / $valor2;
    
    echo "$valor1 + $valor2 = $soma<br>";
    echo "$valor1 - $valor2 = $subt<br>";
    echo "$valor1 * $valor2 = $mult<br>";
    echo "$valor1 / $valor2 = $divi<br>";
    ?>
</body>

</html>