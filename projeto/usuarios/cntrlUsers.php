
<?php
require '../utils/conexao.php';
//conferir sempre essa tela
//prepara a consulta SQl
$sql = "SELECT * FROM usuarios;";
//seleciona apenas os campos que serão usados
$sql_eficiente = " SELECT id_usuario, nome, nivel_acesso, cep, endereco, numero, complemento, cidade, estado, senha, email, telefone, data_nascimento, cpf ";

//envia o SQL para o prepare Statement:
$stmt = $conn->prepare($sql);

//executa a consulta SQL
$stmt->execute();

//pega o resultado em uma variavel

$dados = $stmt->get_result(); //Somente com SQL genérico

/* caso use SQL Eficiente:
Colocar na mesma ordem do Script SQL
$stmt->bind_result($id_usuario, $nome, $nivel_acesso, $email, $telefone, $cpf)
*/
$nivel = array(
    'administrador', 'usuario'
);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
            integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
            crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form method="post" action="processar.php">
                <fieldset class="border bg-light p-3 rounded shadow">
                    <legend class="w-auto p-1 border rounded">Lista De
                        Clientes</legend>
                    <div class="row">

                        <div class="col-sm-2">
                            <a href="../dashboard.php">
                                <button type="button" class="algn btn btn-primary">Voltar</button> 
                            </a>   
                        </div>
                        <div class="col-sm-4">
                            <label for="txt_nome">Nome:</label>
                            <input class="form-control" id="txt_nome"
                                name="txt_nome" type="text"
                                placeholder="Pesquise o Nome:">
                        </div>
                        <div class="col-sm-2 ">
                            <label for="txt_RG">Data Inicial:</label>
                            <input class="form-control" id="txt_data"
                                name="txt_data" type="date"
                                placeholder="dd/mm/aaa:">
                        </div>
                        <div class="col-sm-2 ">
                            <label for="txt_RG">Data Final:</label>
                            <input class="form-control" id="txt_data"
                                name="txt_data" type="date"
                                placeholder="dd/mm/aaa:">
                        </div>
                        <div class="col-sm-2 ">
                            <button
                                class=" btn btn-primary align-self-center">Buscar</button>
                        </div>
                    </div>

                    <table class="table rounded table-striped">

                        <thead class="thead-dark ">

                            <tr>
                                <th>Ação</th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Celular</th>
                                <th>Nivel De Acesso</th>
                                <th>Email</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php


                            while($linha = $dados->fetch_assoc()){
                                ?>
                                <tr scope="row">
                                <td>
                                    <a href="#excluir" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="iu_usuario.php?id=<?= $linha['id_usuario']?>" class="btn btn-secondary">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                                <td><?=$linha['id_usuario']?></td>
                                <td>p<?=$linha['nome']?></td>
                                <td><?=$linha['telefone']?></td>
                                <td>
                                    <span class="badge <?= $corNivel[$linha['nivel_acesso']]?>">
                                    <?= $nivel[$linha['nivel_acesso']]?>
                                </td>
                                <td><?=$linha['email']?></td>
                                </tr>
                                <?php
                                }
                                ?>

                    </fieldset>
                </form>
        </div>

    </body>
</html>