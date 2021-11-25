<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try 
        {
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }
        catch (PDOException $e) 
        {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($user_name, $user_email, $user_password)
    {
        global $pdo;
        //verificar se já está cadastrado
        $sql = $pdo->prepare("SELECT user_id FROM user WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;  //já está cadastrado
        }
        else  //cadastra
        {
            $sql = $pdo->prepare("INSERT INTO user (user_name, user_email, user_password) VALUES (:n, :e, :s)");
            $sql->bindValue(":n",$user_name);
            $sql->bindValue(":e",$user_email);
            $sql->bindValue(":s",$user_password);
            $sql->execute();
            return true;
        }
        
    }

    public function logar($user_email, $user_password)
    {
        global $pdo;
        
        $sql = $pdo->prepare("SELECT user_id FROM user WHERE user_email = :e AND user_password = :s");
        $sql->bindValue(":e",$user_email);
        $sql->bindValue(":s",$user_password);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['user_id'] = $dado['user_id'];
            return true;
        }
        else
        {
            return false;
        }
    }
}



?>