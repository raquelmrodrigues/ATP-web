<?php 
    require_once 'usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/cadastro_usuario.css">
        <title>Cadastrar Usuário</title>
    </head>

    <body>

        <div id="corpo-form">
            <h1>Cadastrar Usuário</h1>
            <form method="POST">
                <input type="nome" name="user_name" placeholder="Nome">
                <input type="email" name="user_email" placeholder="E-mail">
                <input type="password" name="user_password" placeholder="Senha">
                <input type="submit" name="insert-btn" value="Cadastrar">   
            </form>
        </div>

        <?php

        if(isset($_POST['user_name']))
        {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];

            if(!empty($user_name) && !empty($user_email) && !empty($user_password))
            {
                $u->conectar("atp-web", "localhost", "root", "1711");
                if($u->msgErro == "")
                {
                    if($u->cadastrar($user_name,$user_email,$user_password))
                    {
                        echo "Cadastrado com sucesso!";
                    }
                    else
                    {
                        echo "Email já cadastrado!";
                    }
                }
                else
                {
                    echo "Erro: ".$u->msgErro;
                }
            }
            else
            {
                echo "preencha todos os campos!";
            }
        }

        ?>
    </body>
</html>