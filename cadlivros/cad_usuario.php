<?php

require_once 'config.php';

$conexao = @mysql_connect ($host, $usuario, $senha) or exit(mysql_error());
mysql_select_db($banco);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de usuário</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css" type="text/css">
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body class="w3-pale-red">
        
        <?php
        
        if (isset($_POST['cadastrar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $senha = MD5($_POST['senha']);
            
            $sql = "insert into usuarios (nome, email, login, senha) values ('" . $nome . "', '" . $email . "', '" . $login . "', '" . $senha . "')";
            
            $query = mysql_query($sql, $conexao);
            
            echo '<p>Dados cadastrados com sucesso!</p>';
            
            header('Location:login_user.php');
        }
        ?>

        <div class="container-gray">
            <div class="w3-container imgcenter" style="width:60%"> 
            
            <h2 class="titles-white"><b>Cadastro de usuário</b></h2>
            
            <form class="" name="form1" action="cad_usuario.php" method="post">
                <input type="hidden" name="cadastrar" value="1" /><br/>
                <label class="formlabel">Nome</label><br/>
                <input class="w3-input" type="text" name="nome" value="" size="50"><br/>
                <label class="formlabel">Email</label><br/>
                <input class="w3-input" type="text" name="email" value="" size="50"><br/>
                <label class="formlabel">Login</label><br/>
                <input class="w3-input" type="text" name="login" value="" size="50"><br/>
                <label class="formlabel">Senha</label><br/>
                <input class="w3-input" type="password" name="senha" value="" maxlength="25" size="50"><br/>
                <br/><br/>
                <input class="button-pink" type="submit" name="bcadastrar" value="Cadastrar">
                
                <a class="button-pink" href="login_user.php">Encerrar</a>
            </form>
        </div>
        </div>
    </body>
</html>

                               
                