<form action="salvar.php" method="post">

    <fieldset>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
    </fieldset>

    <fieldset>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco" step="0.01">
    </fieldset>
    
    <fieldset>
        <label for="estoque">Quantidade em estoque:</label>
        <input type="text" name="quantidade" id="quantidade">
    </fieldset>

    <input type="submit" value="Cadastrar">

</form>