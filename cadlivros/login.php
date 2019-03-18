<?php

session_start();
require_once 'config.php';

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());

mysql_select_db($banco);

if (isset($_POST['entrar'])) {
    $login = $_POST['login'];
    $senha = MD5($_POST['senha']);
    $verifica = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");

    if (mysql_num_rows($verifica) <= 0) {
        echo "falhou";
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login_user.php';</script>";
        die();
    } else {
        setcookie('login', $login);
        $_SESSION['login'] = true;
        $_SESSION['usuario'] = $login;
        echo"<script language='javascript' type='text/javascript'>window.location.href='index.php';</script>";
    }
}