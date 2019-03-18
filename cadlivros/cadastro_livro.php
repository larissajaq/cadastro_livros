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
        <title>Cadastro de livros</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body class="w3-pale-red">

         <?php

        if (isset($_POST['salvar'])) {
            $nome = ucwords($_POST['nome']);
            $autor = $_POST['autor'];
            $editora = $_POST['editora'];
            
            $foto = $_FILES['arquivo1']['name'][0];
            if ($_FILES['arquivo1']['name'][0] != '') {
                $extensao = strrchr($foto, '.');
                $extensao = strtolower($extensao);
                $novonome = md5(microtime()) . $extensao;
                
                move_uploaded_file($_FILES['arquivo1']['tmp_name'][0], 'fotos/' . $novonome);
                
                $img = ('fotos/' . $novonome);
            }else{
                $img = ('');
            }
    echo $img;
            $sql = "insert into livros (nome, autor, editora, foto) values ('".$nome."', '".$autor."', '".$editora."', '".$img."')";
    
            $query = mysql_query($sql, $conexao);
    
            //echo '<p>Livro cadastrado com sucesso</p>';
            echo "<script language='javascript' type='text/javascript'>alert('Livro cadastrado com sucesso!');window.location.href='cadastro_livro.php';</script>";
    
            //header('Location:cadastro_livro.php');
        }
        ?>
        <div class="container-gray">
        <div class="w3-container imgcenter" style="width:60%">
        
            <h2 class="titles-white"><b>Cadastro de livro</b></h2>
        
            <form class="" name="form1" action="cadastro_livro.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="salvar" value="1" />
                <label class="formlabel">Nome</label><br />
                <input class="w3-input" type="text" name="nome" value="" size="70" /><br />
                <label class="formlabel">Autor</label><br />
                <input class="w3-input" type="text" name="autor" value="" size="70" /><br />
                <label class="formlabel">Editora</label><br />
                <input class="w3-input" type="text" name="editora" value="" size="70" /><br />
                <label class="formlabel" />Capa</label><br/>
                <input type="file" name="arquivo1[]" /><br />
                <br /><br />
                <input class="button-pink" type="submit" name="bsalvar" value="Salvar" />
                
                <a class="button-pink" href="galeria_livros.php">Encerrar</a>
            
            </form>
        </div>
    </div>
    </body>
</html>    