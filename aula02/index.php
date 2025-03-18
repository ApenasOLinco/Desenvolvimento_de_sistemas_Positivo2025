<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 - Home</title>
</head>
<body>
    <h1>Aula 02 - PHP - Página Inicial</h1>

    <?php 

        $nome_aluno = "Linco"; // String
        $curso = "ADS"; // String
        $periodo = 3; // Int

        // \n = Aplica ma quebra de linha para o Interpretador
        // \t = Aplica uma tabulação para o Interpretador
        echo "Nome do aluno: " . $nome_aluno . "<br>"; // Concatenação
        echo "\n\tCurso: $curso<br>"; // Interpolação
        echo "\n\tPeríodo atual: " . $periodo . "<br>\n";

    ?>

    <h2>Exemplos e Exercícios</h2>
    <ul>
        <li><a href="exercicios/Exemplo01.php">Exemplo 01</a></li>
    </ul>
</body> 
</html>