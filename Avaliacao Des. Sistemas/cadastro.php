<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <h1>Página de Cadastro</h1>

    <?php
    // Tipo de requisito
    if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
        echo 'Requisito inválido. Acesse esta página pelo formulário.';
        return;
    }

    $nome = $_POST['nome'];
    $consumo = $_POST['consumo'];
    $horas = $_POST['horas'];
    $dias = $_POST['dias'];
    $kilowatt_hora = $_POST['kilowatt-hora'];

    // Campo "nome"
    if (empty($nome)) {
        echo 'Não foi possível obter o nome do aparelho. Tente enviar novamente.';
        return;
    }

    // Campo "consumo"
    if (empty($consumo)) {
        echo 'Não foi possível obter o consumo do aparelho. Tente enviar novamente.';
        return;
    }

    // Campo "horas"
    if (empty($horas)) {
        echo 'Não foi possível obter as horas de uso do aparelho. Tente enviar novamente.';
        return;
    }

    // Campo "dias"
    if (empty($dias)) {
        echo 'Não foi possível obter o número de dias que o aparelho ficará ligado. Tente enviar novamente;';
    }

    // Campo "kilowatt-hora"
    if (empty($kilowatt_hora)) {
        echo 'Não foi possível obter o valor do kilowatt-hora. Tente enviar novamente.';
        return;
    }

    /* Todos os campos estão preenchidos e foram enviados com sucesso */

    // Cálculo do consumo diário
    $x = $consumo / 1000;
    $consumo_diario = $x * $horas;

    // Cálculo do consumo mensal
    $consumo_mensal = $consumo_diario * $dias;

    // Cálculo do consumo do aparelho
    $consumo_aparelho = $consumo_mensal * $kilowatt_hora;

    // Cálculo da categoria de consumo. 
    $categoria_consumo =
        ($consumo_mensal <= 5 ? "baixa" :
        $consumo_mensal <= 10) ? "moderada" :
        "elevada";
    ?>

    <h2>Informações relevantes</h2>
    <p>Nome do aparelho: <?php echo $nome; ?></p>
    <p>Consumo máximo em watts do aparelho: <?php echo $consumo; ?></p>
    <p>Número de horas que o aparelho é ligado por dia: <?php echo $horas; ?></p>
    <p>Número de dias que o aparelho ficará ligado no mês: <?php echo $dias ?></p>
    <p>Valor do kilowatt/hora: <?php echo "R$ $kilowatt_hora"; ?></p>
    <p>Consumo diário do aparelho: <?php echo "R$ $consumo_diario"; ?></p>
    <p>Consumo mensal do aparelho: <?php echo "R$ $consumo_mensal"; ?></p>
    <p>Consumo do aparelho: <?php echo "R$ $consumo_aparelho"; ?></p>
    <p>O seu aparelho possui uma categoria <?php echo $categoria_consumo; ?> de consumo.</p>

    <p><a href="./index.php">Voltar à página inicial</a></p>
</body>

</html>