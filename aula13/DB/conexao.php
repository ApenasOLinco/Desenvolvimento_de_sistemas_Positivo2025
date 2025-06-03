<?php
function db_connect()
{
    $server = 'localhost:3307';
    $user = 'root';
    $pass = '';
    $database = 'bd_login';

    $conn = mysqli_connect($server, $user, $pass, $database);

    if (!$conn) {
        exit("Erro na conexão: " + mysqli_connect_error());
    }

    return $conn;
}
