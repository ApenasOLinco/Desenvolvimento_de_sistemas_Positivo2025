<?php 
function conectar_bd() {
    $host = 'localhost:3307';
    $user = 'root';
    $senha = '';
    $database = 'aula09';
    
    $conn = mysqli_connect($host, $user, $senha, $database);

    if (!$conn) {
        die("Erro ao conectar ao banco de dados: " . mysqli_error($conn));
    }

    return $conn;
}
?>