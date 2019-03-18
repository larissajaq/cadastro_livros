<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: login_user.php');
}

require_once 'config.php';

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$sql = 'select id, nome, autor, editora, foto from livros';
$query = mysql_query($sql, $conexao);
$registros = mysql_num_rows($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Meus livros</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="w3.css" type="text/css">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="w3gallery.css" type="text/css">
    </head> 
    <body class="offwhite">
        <div class="w3-pale-red w3-center w3-centered">
            
            <label for="show-menu" class="show-menu list-link">Show Menu</label>
    <input type="checkbox" id="show-menu" role="button">
            
            <ul class="menu" id="menuzinho">
                <li class="list-left"> <a class="list-link titles" href="index.php">Home</a></li>
                <li class="list-left"><a class="list-link titles" href="galeria_livros.php">Meus Livros</a></li>
                <li class="list-left"><a class="list-link titles" href="lista_frases.php">Fragmentos</a></li>
                <li class="list-right"><a class="list-link titles" href="cad_usuario.php">Sign up</a></li>
                <li class="list-right"><a class="list-link titles box" href="login_user.php">Login</a></li>
            </ul>
        </div>
        <div class="w3-container w3-padding minimargin margintop" width:"100%">
        <h1 class="text-center titles">Meus Livros </h1>
                    
            <?php
            
            if($registros) {
                
                while ($result = mysql_fetch_array($query)) {
                    echo '<div class="gallery">';
                    echo '<a target="_top" href="pag_livros.php?id=' . $result['id'] . '">';
                    echo '<img src="' . $result['foto'] . '" height="150"><br /><br />';
                    echo '</a>';
                    echo '<div class="desc">' . $result['nome'] . '</div>';
                    echo '</div>';                                     
                }
            }else{
                echo '<p>Nenhum livro cadastrado no momento</p>';
            }
            ?>
        <div class="w3-container">           
            <a class="button-pink position-right" href="cadastro_livro.php">Cadastrar novo livro</a>
        </div>
    </body>
</html>
