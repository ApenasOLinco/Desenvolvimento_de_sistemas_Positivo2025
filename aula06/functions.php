<?php 
    function validar_form() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function verificar_campos_em_branco() {
        return isset($_POST['valor1']) && isset($_POST['valor2']);
    }

    function verificar_valor_numerico() {
        return is_numeric($_POST['valor1']) && is_numeric($_POST['valor2']);
    }
?>