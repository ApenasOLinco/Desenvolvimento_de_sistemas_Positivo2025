<h1>Cadastro de Aparelho</h1>

<form action="cadastro.php" method="post">
    <label for="nome">Nome do aparelho:</label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <br>
    <label for="consumo">Consumo máximo em watts do aparelho:</label>
    <input type="number" name="consumo" id="consumo" required>
    <br>
    <br>
    <label for="horas">Número de horas que o aparelho é ligado por dia:</label>
    <input type="number" name="horas" id="horas" required>
    <br>
    <br>
    <label for="dias">Número de dias que o aparelho ficará ligado no mês:</label>
    <input type="number" name="dias" id="dias" required>
    <br>
    <br>
    <label for="kilowatt-hora">Valor do kilowatt/hora:</label>
    <input type="number" name="kilowatt-hora" id="kilowatt-hora" step="0.01" required>
    <br>
    <br>
    <button type="submit">Enviar dados</button>
</form>