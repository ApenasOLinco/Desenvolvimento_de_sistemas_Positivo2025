<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$login_usuario = "admin";
$login_senha = "123";

if ($usuario !== $login_usuario || $senha !== $login_senha) {
    header('location:index.php?code=1');
} else {

    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;

    header('location:home.php');
    
}