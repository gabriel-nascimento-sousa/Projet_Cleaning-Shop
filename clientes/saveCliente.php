<?php
    $conexão = new mysqli('Localhost','root','','loja');
    if(isset($_POST['update'])){
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $telefone = $_POST['telefone']; 
    
        $sqlUpdate = "UPDATE clientes SET nome='$nome', cidade='$cidade', cep='$cep', rua='$rua',numero='$numero', telefone='$telefone' WHERE id='$id'";

        
        $result = $conexão->query($sqlUpdate);

    }
    header('Location: lista-de-clientes.php');

?>