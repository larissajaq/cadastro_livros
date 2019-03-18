<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['login'])) {
    header('location: login_user.php');
}

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$id = (int)$_GET['id'];
            
            $sql = 'select id, nome, autor, editora, foto from livros where id = '. $id;
            
            $query = mysql_query($sql, $conexao);            
            $result = mysql_fetch_array($query);
            mysql_free_result($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Fragmentos favoritos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css" type="text/css">
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body class="spring">
        <div class="container">
        <?php
        echo '<div class="margin">';
        echo '<div class="w3-padding-large float-left">';
        echo '<img src="' . $result['foto'] . '" width="400" ><br /><br />';                             
        echo '</div>';
        echo '<div class="margin">';
        echo '<h1 class="title-livro">' . ($result['nome']) . '</h1>';
        echo '<p class="info"><b>Autor</b> ' . ucwords($result['autor']) . '</p>';
        echo '<p class="info"><b>Editora</b> ' . ucwords($result['editora']) . '</p>';
        echo '<div>';
        echo '<p class="button-gray">' . '<a title="Editar" href="altera_livros.php?id=' . ($result['id']) . '">Editar</a>' . ' </p>';
        echo '<p class="button-gray">' . '<a title="Excluir" href="deleta.php?id=' . $result['id'] . '">Excluir</a>' . ' </p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<br/><br/>';
        echo '<div class="w3-padding-large clear-left">';
        echo '<h2 class="titles margin">Fragmentos</h2>';
                
        $at = $result['id'] ;

                        $sql2 = 'select * from frases where id_livro = ' . $at;

                        $query2 = mysql_query($sql2, $conexao);                        
                        $registros = mysql_num_rows($query2);
                                              
        if($registros) {
                while ($result2 = mysql_fetch_array($query2)) {                                        
                    echo '<div class="minibox-frase">';
                    echo '<p>"' . ucfirst($result2['frase']) . '"</p>';
                    echo '</div>';
                }
            }else{
                echo '<p class="warning">Nenhum fragmento registrado no momento</p>';
            }
            echo '</div>';
            ?>
            <a class="button-pink position-right" href="galeria_livros.php">Voltar</a>
        </div>
    </body>
</html>