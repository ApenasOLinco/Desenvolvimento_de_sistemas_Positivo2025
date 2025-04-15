<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 07 - Home</title>
</head>

<body>
    <h1>Aula 07 - Home</h1>
    <h2>Boletim Bimestral</h2>

    <form action="medias.php" method="post">
        <p>
            <label for="Aluno">Nome do Aluno:</label>
            <input type="text" name="Aluno" id="Aluno" required>
        </p>
        
        <p>
            <label for="Matemática">Nota de Matemática</label> <br>
            <input type="number" name="Matemática" id="Matemática" min="0" max="10" step="0.1">
        </p>

        <p>
            <label for="Física">Nota de Física</label> <br>
            <input type="number" name="Física" id="Física" min="0" max="10" step="0.1">
        </p>

        <p>
            <label for="Química">Nota de Química</label> <br>
            <input type="number" name="Química" id="Química" min="0" max="10" step="0.1">
        </p>

        <p>
            <label for="Biologia">Nota de Biologia</label> <br>
            <input type="number" name="Biologia" id="Biologia" min="0" max="10" step="0.1">
        </p>

        <p>
            <label for="Português">Nota de Português</label> <br>
            <input type="number" name="Português" id="Português" min="0" max="10" step="0.1">
        </p>

        <p>
            <label for="História">Nota de História</label> <br>
            <input type="number" name="História" id="História" min="0" max="10" step="0.1">
        </p>

        <p>
            <label for="Geografia">Nota de Geografia</label> <br>
            <input type="number" name="Geografia" id="Geografia" min="0" max="10" step="0.1">
        </p>

        <p>
            <label for="Filosofia">Nota de Filosofia</label> <br>
            <input type="number" name="Filosofia" id="Filosofia" min="0" max="10" step="0.1">
        </p>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>