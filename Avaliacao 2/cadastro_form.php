<form action="salvar.php" method="post">

    <fieldset>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="campo-cadastro">
    </fieldset>

    <fieldset>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco" step="0.01" class="campo-cadastro">
    </fieldset>

    <fieldset>
        <label for="estoque">Quantidade em estoque:</label>
        <input type="number" name="quantidade" id="quantidade" class="campo-cadastro">
    </fieldset>

    <input type="submit" value="Cadastrar" id="botao-cadastro">

</form>