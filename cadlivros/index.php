<?php

require_once 'config.php';
// conexão ao banco de dados usando login e senha guardados no config.php
$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

// resgatar os registros no banco de dados
$sql = "select id, frase, id_livro from frases order by id DESC LIMIT 3";
$query = mysql_query($sql, $conexao);
$registros = mysql_num_rows($query);

?>

<html>
    <head> 
        <title>Menu</title> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="w3.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head> 
    <body class="offwhite">
                
        <div class="w3-pale-red w3-center w3-centered">
            
            <label for="show-menu" class="show-menu list-link">Show Menu</label>
    <input type="checkbox" id="show-menu" role="button">
            
            <ul class="menu" id="menuzinho">
                <li class="list-left"><a class="list-link titles" href="galeria_livros.php">Meus Livros</a></li>
                <li class="list-left"><a class="list-link titles" href="lista_frases.php">Fragmentos</a></li>
                <li class="list-right"><a class="list-link titles" href="cad_usuario.php">Sign up</a></li>
                <li class="list-right"><a class="list-link titles box" href="login_user.php">Login</a></li>
            </ul>                
        </div>

        <div class="minimargin clear-left clear-right"> 
            <?php
            echo '<div class="box-menu list-left">';
                echo '<h3 class="titles w3-center">Últimos fragmentos</h2>';
                
            if($registros) {
                while ($result = mysql_fetch_array($query)) {
                    
                echo '<p class="minifrases boxzin">"' . ucfirst($result['frase']) . '"<p><br>';
                }
            }else{
                    echo "<p>Nenhum fragmento registrado ainda!</p>";               
            }
            echo '</div>';
            ?>
        </div>
                
        <div class="box-menu list-left width">
            <img class="imgcenter imgmargin" src="icones/estante.png" alt="Sorry, image not found" height="220px"><br/>
            <a class="button-pink buttoncenter width" href="cadastro_livro.php">Cadastrar novo livro</a>
        </div>
        <div class="box-menu-last list-left width">
            <img class="imgcenter imgmargin" src="icones/quote.png" alt="Sorry, image not found" height="220px"><br/>
            <a class="button-pink buttoncenter width"  href="cad_frases.php">Registrar fragmento</a>
        </div>