<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 - Exemplo 01</title>
</head>
<body>
    <a href="/index.php">Voltar para a página inicial</a>
    <h1>Exemplo 01</h1>
    <h3>
        "Escreva um algoritmo que leia um número digitado pelo usuário e mostre a mensagem
        "Número maior do que 10!”, caso este número seja maior, ou “Número menor ou igual a 10!”,
        caso este número seja menor ou igual"
    </h3>

    <form action="exemplo01.php" method="post">
        <p>
            <label for="numberval">Insira um número inteiro: </label>
            <input type="number" name="numberval" id="numberval" min=1 max=100 required placeholder="1-100">
        </p>
        <p>
            <button type="submit">Verificar</button>
        </p>
    </form>

    <?php 

        /*
            A variável $valor irá receber o campo do 
            formulário com o nome "valor" enviado via POST
        */
        if (!empty($_POST['numberval'])) {
            $valor = $_POST['numberval'];
            echo "<h3>";

            if($valor <= 10) echo "Número menor ou igual a 10!";
            else echo "Número maior que 10!";

            echo "</h3>";
        }
        
    ?>
</body>
</html>