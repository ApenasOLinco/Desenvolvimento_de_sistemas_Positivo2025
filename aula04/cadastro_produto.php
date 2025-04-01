<h2>Cadastro de produto</h2>

<form action="cadastro_produto.php" method="post">
    <label for="nome-produto">Nome do produto</label>
    <input type="text" name="nome-produto" id="nome-produto">
    
    <label for="nome-produto">Nome do produto</label>
    <input type="text" name="nome-produto" id="nome-produto">
    
    <label for="nome-produto">Nome do produto</label>
    <input type="text" name="nome-produto" id="nome-produto">

    <button type="submit">Enviar</button>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
    }
?>