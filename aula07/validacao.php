<?php

function form_post_nao_enviado()
{
    return $_SERVER['REQUEST_METHOD'] != "POST";
}

function validar_form()
{
    $erros = [];

    array_push($erros, );
}

function campos_estao_em_branco()
{
    $erros = [];

    foreach ($_POST as $campo => $valor) {
        if (strlen($valor) == 0) {
            array_push($erros, $campo);
        }
    }

    return $erros;
}

function campos_nao_numericos()
{
    $erros = [];

    foreach ($_POST as $campo => $valor) {
        if ($campo == "Aluno") {
            continue;
        }

        if (!is_numeric($valor))
            array_push($erros, "O campo $campo nao é numérico.");
    }

    return $erros;
}

function notas_fora_de_intervalo()
{
    foreach ($_POST as $campo) {

        if ($campo < 0) {

        }
    }
}
?>