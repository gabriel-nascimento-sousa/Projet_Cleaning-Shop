<?php
    //conexão com o banco de dados
    $conexão = new mysqli('Localhost','root','','loja');
    //verifica se existe uma variável cadastrar
    if(isset($_POST['cadastrar'])){
        //se a variavel cadastrar existir, armazena todo o conteudo do formulário no banco de dados
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $telefone = $_POST['telefone'];

        $result = mysqli_query($conexão, "INSERT INTO clientes(nome,cidade,cep,rua,numero,telefone) 
        VALUES('$nome','$cidade','$cep','$rua','$numero','$telefone')");

    }
    $sql = "SELECT * FROM clientes ORDER BY id";
    $result = $conexão->query($sql);

    
?>
<link rel="stylesheet" href="lista-clientes.css">
<body>
    <div class="box">
        <div class="header">
            <p><a href="../home/home.html">Home</a></p>
            <p>/</p>
            <p><a href="../clientes/lista-de-clientes.php">Clientes</a> </p>
        </div>
        <h1>Lista de clientes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOME</th>
                    <th>CIDADE</th>
                    <th>CEP</th>
                    <th>RUA</th>
                    <th>NUMERO</th>
                    <th>TELEFONE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data= mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['cidade']."</td>";
                        echo "<td>".$user_data['cep']."</td>";
                        echo "<td>".$user_data['rua']."</td>";
                        echo "<td>".$user_data['numero']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td> <a href='../clientes/deletarCliente.php?id=$user_data[id]'><img  src='../imagens/btn-delete.svg' alt=''></a>
                        </td>";
                        echo "<td width='30px'> <a href='../clientes/editarCliente.php?id=$user_data[id]'><img src='../imagens/edit.svg' alt=''></a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <div class="botao">
            <a href="cadastrar.html"><button>novo cliente</button></a>
        </div>
    </div>
</body>