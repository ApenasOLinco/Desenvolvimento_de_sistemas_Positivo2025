<h2>Cadastro de Cliente</h2>

<form action="cadastrado.php" method="post">
    <p>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome">
    </p>

    <p>
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" id="email">
    </p>

    <p>
        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" id="telefone">
    </p>

    <p>
        <label for="endereco">Endereço:</label><br>
        <input type="text" name="endereco" id="endereco">
    </p>

    <p>
        <button type="submit">Cadastrar</button><br>
        <button type="reset">Apagar</button>
    </p>
</form>