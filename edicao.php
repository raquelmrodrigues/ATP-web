<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/area_emprestimo.css">
        <title>Editar Item</title>
    </head>

    <body>

        <div id="cadastro">
        <div id="formulario">
            <h1>Editar Item</h1>
            
            <?php
                $conn = mysqli_connect('localhost','root','','atp-web');
                if(isset($_GET['edit']))
                {
                    $edit_id = $_GET['edit'];

                $select = "SELECT * FROM emprestimo WHERE id_item='$edit_id'";
                $run = mysqli_query($conn,$select);
                    while($row = mysqli_fetch_array($run))
                    {
                        $item = $row['item'];
                        $contato = $row['contato'];
                        $data_emp = $row['data_emp'];
                        $data_dev = $row['data_dev'];
                    }
                }
            ?>

            <form method="POST">
                <input type="text" name="item" value="<?php echo $item?>">
                <input type="text" name="contato"  value="<?php echo $contato?>">
                <input type="date" name="data_emp" value="<?php echo $data_emp?>">
                <input type="date" name="data_dev" value="<?php echo $data_dev?>">
                <div id="submit">
                    <input type="submit" name="insert-btn" value="Cadastrar item">
                </div>
                <div id="submit">
                    <a href="area_emprestimo.php"><input type="submit" name="insert-btn" class="submit" value="Voltar para itens cadastrados"></a>
                </div>
            </form>
        </div>
        </div>

        <?php
            $conn = mysqli_connect('localhost','root','','atp-web');
 
            if(isset($_POST['insert-btn'])){

                $eitem = $_POST['item'];
                $econtato = $_POST['contato'];
                $edata_emp = $_POST['data_emp'];
                $edata_dev = $_POST['data_dev'];  
            
                $update = "UPDATE emprestimo SET item='$eitem', contato='$econtato', data_emp='$edata_emp', data_dev='$edata_dev' WHERE id_item='$edit_id'";

                $run_update = mysqli_query($conn,$update);
                if($run_update === true){
                    echo "Dados atualizados com sucesso";
                }else{
                    echo "Falha ao atualizar os dados";
                }
            } 
        ?>
    </body>
</html>