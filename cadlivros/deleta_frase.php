<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: loginuser.php');
}

require 'config.php';

if (!isset($_GET['id'])) {
    exit('Frase não encontrada! ( <a href="galeria_livros.php">Voltar</a> )');
}

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());

mysql_select_db($banco);

$id = (int) $_GET['id'];

$sql = 'delete from frases where id = ' . $id;

$query = mysql_query($sql, $conexao);

mysql_close($conexao);

header('location: galeria_livros.php'); 