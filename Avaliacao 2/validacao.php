<?php

function validar()
{
    $erros = [];

    if ($erro_metodo = metodo_nao_post()) {
        $erros = array_merge($erros, $erro_metodo);
    }

    if ($erros_campos = campos_vazios()) {
        $erros = array_merge($erros, $erros_campos);
    }

    if ($erros_tipos = tipos_errados()) {
        $erros = array_merge($erros, $erros_tipos);
    }

    if ($erros) {
        echo "<h2>" . (sizeof($erros) > 1 ? "Erros" : "Erro") . " ao validar o formulário:</h2>";
        echo "<ul class='lista-erros'>";

        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }

        echo "</ul>";
        die();
    }
}

function metodo_nao_post()
{
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        return ["Método inválido. Preencha o formulário para acessar essa página."];
    }

    return [];
}

function campos_vazios()
{
    $erros = [];


    foreach ($_POST as $campo => $valor) {
        if (empty($valor)) {
            $erros[] = "O campo $campo não está definido!";
        }
    }

    return $erros;
}

function tipos_errados()
{
    $erros = [];

    $nome = $_POST["nome"];
    if (!is_string($nome)) {
        $erros[] = "O campo nome não é string!";
    }

    foreach ($_POST as $campo => $valor) {
        if ($campo == "nome") {
            continue;
        }

        if (empty($valor))
            continue; // Checar nulos é trabalho de outra função verificadora

        if (!is_numeric($valor)) {
            $erros[] = "O campo $campo não é numérico!";
        }
    }

    return $erros;
}
