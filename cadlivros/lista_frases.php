<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['login'])) {
    header('location: login_user.php');
}

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

$sql = "select * from frases order by id DESC";
$query = mysql_query($sql, $conexao);
$registros = mysql_num_rows($query);
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
        <h1 class="text-center titles">Fragmentos favoritos</h1>
        <div class="w3-padding-large imgcenter width-seven">
        <?php
            
            if($registros) {
                while ($result = mysql_fetch_array($query)) {
                    echo '<div>';                    
                    echo '<div class="box-frase">';
                    echo '<p>"' . ucfirst($result['frase']) . '"</p>';
                    echo '</div>';
                    echo '<a class="button-gray list-left" href="deleta_frase.php?id=' . $result['id'] . '">X</a>';
                    echo '<div class="livro">';
                    $at = $result['id_livro'] ;

                        $sql2 = 'select * from livros where id = ' . $at;

                        $query2 = mysql_query($sql2, $conexao);
                        $result2 = mysql_fetch_array($query2);
                        mysql_free_result($query2);

                        $no = $result2['nome'];
                    echo '<p>' . '<a title="livro" href="pag_livros.php?id=' . $at . '">' . $no . ' </a>' . ' </p>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                echo '<p>Nenhum fragmento registrado no momento</p>';
            }
            ?>
            <a class="button-white position-right" href="galeria_livros.php">Voltar</a>
            </div>
        </div>
    </body>
</html>