<?php
    $conexão = new mysqli('Localhost','root','','loja');

    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM clientes WHERE id= $id";
        $result = $conexão->query($sqlSelect);

        if($result->num_rows>0)
        {
            while ($user_data= mysqli_fetch_assoc($result))
            {
                $id = $user_data['id'];
                $nome = $user_data['nome'];
                $cidade = $user_data['cidade'];
                $cep = $user_data['cep'];
                $rua = $user_data['rua'];
                $numero = $user_data['numero'];
                $telefone = $user_data['telefone'];  
            }
        }
        else
        {
            header('Location: lista-de-clientes.php');
        }
    }
    else{
        header('Location: lista-de-clientes.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro-clientes.css">
    <title>Cadastre-se</title>
</head>
<body>
    <header>
        <h1>Clean Shop</h1>
    </header>
    <main>
        <div class="box">
            <div class="fomulario">
                <div class="nav">
                    <a href="../home/home.html">Home</a>/
                    <a href="../clientes/lista-de-clientes.php">Clientes</a>/
                    Cadastrar
                </div>
                <form action="saveCliente.php" method="post">
                    <h1>Cadastro de clientes</h1>
                    <input type="text" name="nome" placeholder="nome" autocomplete="off" required value="<?php echo $nome ?>"><br>

                    <input type="text" name="cidade" placeholder="cidade" autocomplete="off" required value="<?php echo $cidade ?>"><br>
                    
                    <input type="number" name="cep" placeholder="cep" autocomplete="off"required value="<?php echo $cep ?>"><br>
                    
                    <input type="text" name="rua" placeholder="rua" autocomplete="off"required><br>
                    
                    <input type="number" name="numero" placeholder="numero" autocomplete="off" required value="<?php echo $rua ?>"><br>
                    
                    <input type="number" name="telefone" placeholder="telefone" autocomplete="off" required value="<?php echo $telefone ?>"><br>
                    
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update">
                </form>
            </div>
            <div class="imagem">
                <img width="400px" height="500px" src="..//imagens/undraw_no_data_re_kwbl.svg" alt="">
            </div>
            
        </div>
    </main>
</body>
</html>