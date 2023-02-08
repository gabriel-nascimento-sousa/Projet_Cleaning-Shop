<?php
    $conexão = new mysqli('Localhost','root','','loja');

    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM clientes WHERE id=$id";
        $result = $conexão->query($sqlSelect);

        if($result->num_rows>0)
        {
            
            $sqlDelete = "DELETE FROM clientes WHERE id='$id'";
            $resultDelete = $conexão->query($sqlDelete);
        }
    }
    header('Location: lista-de-clientes.php');
?>