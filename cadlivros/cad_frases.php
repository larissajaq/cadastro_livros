<?php

session_start();
require_once 'config.php';

if (!isset($_SESSION['login'])) {
    header('location: login_user.php');
}

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

?>

<!DOCTYPE html> 
<html>
    <head> 
        <title>Registro de citações</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body class="w3-pale-red">

         <?php

        if (isset($_POST['salvar'])) {
            $frase = ucfirst($_POST['frase']);
            $livro = $_POST['livro'];
            
            $sql = "insert into frases (frase, id_livro) values ('".$frase."', '".$livro."')";
    
            $query = mysql_query($sql, $conexao);
    
            //echo '<p>Frase cadastrada com sucesso</p>';
            echo "<script language='javascript' type='text/javascript'>alert('Frase registrada com sucesso!');window.location.href='cad_fases.php';</script>";
    
            header('Location:cad_frases.php');
        }
        ?>
        <div class="container-gray">
        <div class="w3-container imgcenter" style="width:60%">
        
            <h2 class="titles-white"><b>Registro de Citações</b></h2>
        <br/><br/>
            <form class="" name="form1" action="cad_frases.php" method="post">
                <input type="hidden" name="salvar" value="1" />
                <label class="formlabel">Citação</label><br />
                <textarea class="w3-input" rows="3" cols="60" name="frase" maxlength="1000" placeholder="Escreva aqui sua frase preferida" ></textarea><br />
                <label class="formlabel">Livro</label><br />
                <select class="w3-select w3-border" name="livro" id="livro">
                    <option value="" disabled selected >Selecione o livro</option>
                    <?php
                    $sql = "SELECT * FROM livros order by nome";
                    $res = mysql_query($sql);
                    while ($row = mysql_fetch_assoc($res)) {
                        echo '<option value="' . $row['id'] . '">' . ($row['nome']) . '</option>';
                    }
                    ?>
                </select>
                <br /><br />
                <input class="button-pink" type="submit" name="bsalvar" value="Salvar" />
                
                <a class="button-pink" href="lista_frases.php">Encerrar</a>
            
            </form>
        </div>
        </div>
    </body>
</html>    