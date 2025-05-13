<?php
function conectar() {
    $hostname   = "localhost:3307";
    $username   = "root";
    $senha      = "root";
    $database   = "produtos";
    
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