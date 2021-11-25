<?php
    require_once 'usuarios.php';
    $u = new Usuario;
?>


<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/login.css">
        <title>Login</title>
    </head>
<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" name="user_email" placeholder="Usuário">
            <input type="password" name="user_password" placeholder="Senha">
            <input type="submit" name="insert-btn" value="Login">
            <a href="cadastro_usuario.php">Cadastrar Usuário</a>
        </form>
        </div>

<?php
    if(isset($_POST['user_email']))
    {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if(!empty($user_email) && !empty($user_password))
        {
            $u->conectar("atp-web", "localhost", "root", "1711");
            if($u->msgErro == "") 
            {
                if($u->logar($user_email, $user_password))
                {
                    header("location: area_privada.php");
                }
                else
                {
                    echo "Email e/ou senha inválidos";
                }
            }
            else
            {
                echo "Erro ".$u->msgErro;
            }
        }
        else
        {
            echo "Preencha todos os campos";
        }
    }
?>
    
</body>

</html>