<?php
function conectar() {
    $hostname   = "localhost:3307";
    $username   = "root";
    $senha      = '';
    $database   = "avaliacao_2";
    
    $connection = mysqli_connect(
        $hostname,
        $username,
        $senha,
        $database
    );

    if(!$connection) {
        die("Erro ao conectar ao banco de dados: " . mysqli_error($connection));
    }

    return $connection;
}