<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: loginuser.php');
}
require_once 'config.php';

$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

?>

<html>
    <head>
        <title>Livros</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css" type="text/css">
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body class="w3-pale-red">
        
        <?php
        
        //como deletar a img antiga?
        if(isset($_POST['editar'])) {         
            $id = (int) $_POST['id'];
            $nome = $_POST['nome'];
            $autor = $_POST['autor'];
            $editora = $_POST['editora'];
            
            $foto = $_FILES['arquivo1']['name'][0];
            if ($_FILES['arquivo1']['name'][0] != '') {
                $extensao = strrchr($foto, '.');
                $extensao = strtolower($extensao);
                $novonome = md5(microtime()) . $extensao;
                
                move_uploaded_file($_FILES['arquivo1']['tmp_name'][0], 'fotos/' . $novonome);
                
            $img = ('fotos/' . $novonome);
            }
            
            $sql = "update livros set nome = '" . $nome . "', autor = '" . $autor . "', editora = '" . $editora . "', foto = '" . $img . "' where id = " . $id;
            
            $query = mysql_query($sql, $conexao);
            
            echo '<p>Dados alterados com sucesso!</p>';
        header ('location: galeria_livros.php');
        
        } else {
           
            $id = (int)$_GET['id'];
            
            $sql = 'select id, nome, autor, editora, foto from livros where id = '. $id;
            
            $query = mysql_query($sql, $conexao);
            $result = mysql_fetch_array($query);
            mysql_free_result($query);
        ?>
        
        <div class="container-gray-big">
            <div class="w3-container imgcenter"style="width:60%">
		<h2 class="titles-white">CADASTRO DE AUTORES</h2>  

                <form class=""  name="form1" action="altera_livros.php" enctype="multipart/form-data" method="post">     
                <input type="hidden" name="editar" value="1" />
				<input type="hidden" name="id" value="<?=$result['id']?>" />

                <label class="formlabel">Nome:</label>
                <input class="w3-input" type="text" name="nome" value="<?=$result['nome']?>"  size="70" /><br />
				
                <label class="formlabel">Autor:</label><br />
                <input class="w3-input" type="text" name="autor" value="<?=$result['autor']?>"  size="70" /><br />

                <label class="formlabel">Editora:</label><br />
                <input class="w3-input" type="text" name="editora" value="<?=$result['editora']?>"  size="70" /><br />
				
                <label class="formlabel">Foto:</label><br />
                
                <img src="<?=$result['foto']?>" width="400" ><br /><br />                               
                <input type="file" name="arquivo1[]" /><br />
                <br /><br />
                <input class="button-pink" type="submit" name="bsubmit" value="ALTERAR" />
				<a class="button-pink" href="galeria_livros.php">ENCERRAR</a>
                </form>  
            </div>
		</div>
		<?php } ?>
    </body> 
</html>   