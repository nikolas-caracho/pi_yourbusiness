<?php
require '../utils/conexao.php';
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";

if($id){
    $sql = "SELECT * FROM usuarios WHERE id_usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $dados = $stmt->get_result();

    if($dados->num_rows>0){

        $user = $dados->fetch_assoc();

    }else{
        ?>
        <script>
            history.back();
        </script>    
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
         integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="/tarefa/bd/bd-usuario.php" method="post">
            <input type="hidden" id="id_usuario" name="id_usuario">
            <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id'])? "ALTERAR" : "INCLUIR"?>">
            <fieldset class="border bg-light p-3 rounded shadow">
                <legend class="w-auto text-center p-1 border rounded"><?= ($id) ?"ALTERAÇÃO DE USUÁRIO" : "CADASTRO DE USUÁRIO" ?></legend>
                <div class= " row">
                    <div class="col-sm-12">
                        <a href="../dashboard.php">
                            <button type="button" class="algn btn btn-primary">Voltar</button> 
                        </a>   
                    </div>
                    <div class="col-sm-6">
                        <label for="txt_nome">Nome:</label>
                        <input class="form-control" id="nome" name="nome" type="text" placeholder="Seu nome:"
                        value="<?= ($id) ? $user['nome'] : null ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="txt_cpf">CPF:</label>
                        <input class="form-control" id="cpf" name="cpf" type="text" placeholder="Seu CPF:"
                        value="<?= ($id) ? $user['cpf'] : null ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="txt_Genero">Tipo de Login:</label>
                        <select class="form-control" id="nivel_acesso" name="nivel_acesso" required value="<?= ($id) ? $user['nivel_acesso'] : null ?>">
                            <option value="">Selecione...</option>
                            <option value="1">Cliente</option>
                            <option value="0">Administrador</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="txt_DN">Data De Nascimento:</label>
                        <input class="form-control" id="dn" name="dn" type="date" placeholder="dd/mm/yyyy:" value="<?= ($id) ? $user['data_nascimento'] : null ?>">
                    </div>
                    

                    <div class="col-sm-6">
                        <label for="txt_E-mail">E-mail:</label>
                        <input class="form-control" id="email" name="email" type="e-mail" placeholder="Seu E-mail:" value="<?= ($id) ? $user['email'] : null ?>">
                    </div>

                    <div class="col-sm-3">
                        <label for="txt_senha">Senha:</label>
                        <input class="form-control" id="senha" name="senha" type="password" placeholder="Sua Senha: "required value="<?= ($id) ? $user['senha'] : null ?>">
                    </div>

                    <div class="col-sm-3">
                        <label for="txt_confirmar_senha">Confirmar Senha:</label>
                        <input class="form-control" id="confirmarsenha" name="confirmarsenha" type="password" placeholder="Repita Sua Senha:"required >
                    </div>

                    <div class="col-sm-4">
                        <label for="txt_Telefone">Telefone:</label>
                        <input class="form-control" id="telefone" name="telefone" type="number" placeholder="Seu Telefone:" value="<?= ($id) ? $user['telefone'] : null ?>">
                    </div>

                    <div class="col-sm-4">
                        <label for="txt_Cep">Cep:</label>
                        <input class="form-control" id="cep" name="cep" type="Number" placeholder="Seu Cep:" value="<?= ($id) ? $user['cep'] : null ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="txt_estado">estado que mora:</label>
                        <select class="form-control" id="estado" name="estado" required value="<?= ($id) ? $user['estado'] : null ?>">
                            <option value="">Selecione...</option>
                            <option value="1">AC</option>
                            <option value="2">AL</option>
                            <option value="3">AP</option>
                            <option value="4">AM</option>
                            <option value="5">BA</option>
                            <option value="6">CE</option>
                            <option value="7">DF</option>
                            <option value="8">ES</option>
                            <option value="9">GO</option>
                            <option value="10">MA</option>
                            <option value="11">MT</option>
                            <option value="12">MS</option>
                            <option value="13">MG</option>
                            <option value="14">PA</option>
                            <option value="15">PB</option>
                            <option value="16">PR</option>
                            <option value="17">PE</option>
                            <option value="18">PI</option>
                            <option value="19">RJ</option>
                            <option value="20">RN</option>
                            <option value="21">RS</option>
                            <option value="22">RO</option>
                            <option value="23">RR</option>
                            <option value="24">SC</option>
                            <option value="25">SP</option>
                            <option value="25">SE</option>
                            <option value="27">TO</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="txt_cidade">endereço:</label>
                        <input class="form-control" id="endereco "name="endereco" type="text" placeholder="enderecoa:" value="<?= ($id) ? $user['endereco'] : null ?>">
                    </div>

                    <div class="col-sm-3">
                        <label for="txt_cidade">cidade:</label>
                        <input class="form-control" id="cidade "name="cidade" type="text" placeholder="cidade que mora:" value="<?= ($id) ? $user['cidade'] : null ?>">
                    </div>

                    <div class="col-sm-3">
                        <label for="txt_cidade">numero da casa:</label>
                        <input class="form-control" id="ncasa "name="ncasa" type="number" placeholder="numero da casa:" value="<?= ($id) ? $user['numero'] : null ?>">
                    </div>

                    
                    <div class="col-sm-3">
                        <label for="txt_cidade">complemento:</label>
                        <input class="form-control" id="complemento "name="complemento" type="text" placeholder="cidade que mora:" value="<?= ($id) ? $user['complemento'] : null ?>">
                    </div>

                    <div class="col-sm d-flex justify-content-center">
                            <button type="submit" class="m-3 btn <?=$cor ?> center">salvar</button> 
                    </div>
                    
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
    
</body>
</html>