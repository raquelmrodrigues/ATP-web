<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo/area_privada.css">

    <title>Empréstimos</title>
</head>
<body>
    
    <div id="conteudo">
        <div class="container">   
            <h1>Empréstimos</h1> 

            <?php
                $conn = mysqli_connect('localhost','root','','atp-web');
                if(isset($_GET['del'])){
                    $del_id = $_GET['del'];
                $delete = "DELETE FROM emprestimo WHERE id_item='$del_id'";
                $run_delete = mysqli_query($conn,$delete);
                    if($run_delete === true){
                        echo "Item deletado com sucesso!";
                    }else{
                        echo "Falha ao deletar item!";
                    }
                }
            ?>

            <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Item emprestado</th>
                <th scope="col">Contato</th>
                <th scope="col">Data de empréstimo</th>
                <th scope="col">Data de devolução</th>
                <th scope="col">Deletar</th>
                <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect('localhost','root','','atp-web' );
                $select = "SELECT * FROM emprestimo";
                $run = mysqli_query($conn,$select);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id_item'];
                    $item = $row['item'];
                    $contato = $row['contato'];
                    $data_emp = $row['data_emp'];
                    $data_dev = $row['data_dev'];
                ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $item;?></td>
                    <td><?php echo $contato;?></td>
                    <td><?php echo $data_emp;?></td>
                    <td><?php echo $data_dev;?></td>
                    <td><a class="btn btn-danger" href="area_privada.php?del=<?php echo $id;?>">Deletar</a></td>
                    <td><a class="btn btn-success" href="edicao.php?edit=<?php echo $id;?>">Editar</a></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <div class="cadastrar">
                <a href="area_emprestimo.php"><input type="submit" value="Cadastrar novo item" class="submit"></a>
            </div>
        </div>
    </div>
</body>
</html>