<?php
    $conexão = new mysqli('Localhost','root','','loja');
    if(isset($_POST['update'])){
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor']; 
    
        $sqlUpdate = "UPDATE produtos SET nome='$nome', valor=$valor WHERE id='$id'";

        $result = $conexão->query($sqlUpdate);

    }
    header('Location: lista-de-produtos.php');

?>