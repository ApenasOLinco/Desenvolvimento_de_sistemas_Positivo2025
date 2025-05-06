<?php
function verificarDados()
{
    $errors = [];

    if($erroMetodo = verificar_metodo()) {
        $errors[] = $erroMetodo;
    }

    if($erroVazio = verificarInputVazio($_POST)) {
        $errors[] = $erroVazio;
    }

    if ($errors) {
        echo "Erros ao validar formulário: <pre>";
        echo "<ul>";

        foreach($errors as $erros) {
            foreach($erros as $erro) {
                echo "<l1>$erro</l1><br>";
            }
        }
        
        echo "</pre>";
        die;
    }
}

function verificar_metodo()
{
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        $errors[] = "O método de requisição utilizado não é permitido";
    }

    return $errors;
}

function verificarInputVazio($dados)
{
    $errors = [];

    if (empty($dados['nome'])) {
        $errors[] = "O campo nome está vazio";
    }

    if (empty($dados['fone'])) {
        $errors[] = "O capo telefone está vazio";
    }

    if (empty($dados['email'])) {
        $errors[] = "O campo email está vazio";
    }

    return $errors;
}
