

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/area_emprestimo.css">
        <title>Cadastrar Empréstimo</title>
    </head>

<body>

    <div id="cadastro">
    <div id="formulario">
        <h1>Cadastrar Empréstimo</h1>
        <form method="POST">
            <input type="text" name="item" placeholder="Item emprestado">
            <input type="text" name="contato" placeholder="Contato">
            <input type="date" name="data_emp" placeholder="Data do empréstimo">
            <input type="date" name="data_dev" placeholder="Data da devolução">
            <div id="submit">
                <input type="submit" name="insert-btn" value="Cadastrar item">
            </div>
        </form>
    </div>
    </div>

    <?php
        $conn = mysqli_connect('localhost','root','','atp-web' );
 
        if(isset($_POST['insert-btn'])){

            $item = $_POST['item'];
            $contato = $_POST['contato'];
            $data_emp = $_POST['data_emp'];
            $data_dev = $_POST['data_dev'];  
            
            $insert = "INSERT INTO emprestimo(item,contato,data_emp,data_dev) VALUES('$item','$contato','$data_emp','$data_dev')";

            $run_insert = mysqli_query($conn,$insert);
            if($run_insert === true){
                echo "Dados salvos com sucesso";
            }else{
                echo "Falha ao salvar os dados";
                }

            }

        ?>

</body>

</html>