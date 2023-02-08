<?php
    $conexão = new mysqli('Localhost','root','','loja');

    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM produtos WHERE id=$id";
        $result = $conexão->query($sqlSelect);
        if($result->num_rows>0)
        {
            while ($user_data= mysqli_fetch_assoc($result))
            {
                $id = $user_data['id'];
                $nome = $user_data['nome'];
                $valor = $user_data['valor'];   
            }
        }
        else
        {
            header('Location: lista-de-produtos.php');
        }
    }
    else{
        header('Location: lista-de-produtos.php');
    }
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar cliente</title>
    <link rel="stylesheet" href="cadastro-produtos.css">
</head>
<body>
    <div class="main">
        <div class="conteudo">
            
            <form action="saveProduto.php" method='post'>
                <div class="header">
                    <p><a href="../home/home.html">Home</a></p>
                    <p>/</p>
                    <p><a href="../produtos/lista-de-produtos.php">Produtos</a> </p>
                    <p>/</p>
                    <p>Editar</p>
                </div>
                <h1>Editar</h1>
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" placeholder="nome" autocomplete="off" required><br>
                <input type="text" name="valor" value="<?php echo $valor ?>" placeholder="valor" autocomplete="off" required><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
                </form>
        </div>
        <!-- <div class="imagem">
            <img height="500px" width="400px" src="../imagens/undraw_no_data_re_kwbl.svg" alt="processando">
        </div> -->
    </div>
</body>
</html>