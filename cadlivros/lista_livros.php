<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: login_user.php');
}

require_once 'config.php';

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$sql = "select * from livros order by nome";
$query = mysql_query($sql, $conexao);
$registros = mysql_num_rows($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lista de livros</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css" type="text/css"
    </head>
    <body class="w3-sand">
        
        <div class="w3-container w3-dark-gray w3-round-xlarge w3-display-topmiddle" style="width:60%" >
            
            <h2 class="w3-panel w3-pale-red w3-margin w3-round-xlarge">Lista de livros</h2>
            <div class="w3-row w3-margin w3-center">
                <div class="w3-col w3-gray l4">
                    <h3>Nome</h3>
                </div>
                <div class="w3-col w3-light-gray l4">
                    <h3>Autor</h3>
                </div>
                <div class="w3-col w3-gray l4">
                    <h3>Editora</h3>
                </div>
            </div>
            
            <?php
            
            if($registros) {
                
                while ($result = mysql_fetch_array($query)) {
                    echo '<div class="w3-row w3-margin w3-center">';
                    echo '<div class="w3-col w3-gray l4">';
                    echo '<p class="w3-left w3-margin">' . ucfirst($result['nome']) . '</p>';
                    echo '</div>';
                    echo '<div class="w3-col w3-light-gray l4">';
                    echo '<p class="w3-left w3-margin">' . '</a> (<a title="Editar" href="altera_livros.php?id=' . $result['id'] . '">Editar</a>)' . ' </p>';
                    echo '</div>';
                    echo '<div class="w3-col w3-gray l4">';
                    echo '<p class="w3-left w3-margin">' . $result['editora'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                echo '<p>Nenhum livro cadastrado no momento</p>';
            }
            ?>

            <a class="w3-btn w3-pale-red w3-margin-bottom w3-round-large" href="altera_livros.php">Editar</a>
            </br>
            <a class="w3-btn w3-pale-red w3-margin-bottom w3-round-large" href="cadastro_livro.php">Cadastrar novo livro</a>
        </div>
    </body>
</html>
