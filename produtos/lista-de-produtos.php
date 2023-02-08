<?php
    //conexão com o banco de dados
    $conexão = new mysqli('Localhost','root','','loja');
    //verifica se existe uma variável cadastrar
    if(isset($_POST['cadastrar'])){
        //se a variavel cadastrar existir, armazena todo o conteudo do formulário no banco de dados
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $result = mysqli_query($conexão, "INSERT INTO produtos(nome,valor) 
        VALUES('$nome','$valor')");
    }
    $sql = "SELECT * FROM produtos ORDER BY valor";
    $result = $conexão->query($sql);
?>
<link rel="stylesheet" href="produtos.css">
<body>
    <div class="box">
        <div class="header">
            <p><a href="../home/home.html">Home</a></p>
            <p>/</p>
            <p><a href="#">Produtos</a> </p>
        </div>
        <h1>Lista de produto</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <tr><input type="checkbox"></tr>
                    <th>NOME</th>
                    <th>VALOR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data= mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['valor']."</td>";
                        echo "<td width='30px'> <a href='../produtos/delet.php?id=$user_data[id]'><img src='../imagens/btn-delete.svg' alt=''></a>
                        </td>";
                        echo "<td width='30px'> <a href='../produtos/editarProduto.php?id=$user_data[id]'><img src='../imagens/edit.svg' alt=''></a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <div class="botao">
            <a href="cadastrar-produto.html"><button>novo produto</button></a>
        </div>
    </div>
</body>