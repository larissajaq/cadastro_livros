<!DOCTYPE html> 
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body class="w3-pale-red">
        <div class="container-gray">
        <div class="w3-container imgcenter" style="width:60%">            
            <br/><br/>
            <h2 class="titles-white">Acesso de usuário</h2>
            
            <form class="" name="form1" action="login.php" method="post">
                <br/><br/>
                <input type="hidden" name="entrar" value="1"><br/>
                <label class="formlabel">Login</label><br/>
                <input class="w3-input" name="login" value="" type="text" size="20" tabindex="1"><br/>
                <label class="formlabel">Senha</label><br/>
                <input class="w3-input" name="senha" value="" type="password" maxlength="25" tabindex="3"><br/>
                <p class="text-center text-pink">Não tem uma conta? <a href="cad_usuario.php">Cadastre-se!</a></p>
                
                <input class="button-pink" type="submit" name="bsubmit" value="ENTRAR" />
                <br><br>
            </form>
        </div>
        </div>
    </body>
</html>
