<?php
require '../utils/conexao.php';
$id = isset($_GET['id']) ? $_GET['id'] : false;

if($id){
    //bind_param
    $sql = "SELECT * FROM usuarios WHERE id_usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $dados = $stmt->get_result();

    //resumir ifs
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
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <style>
        /* suavizar css */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .border {
            border: 1px solid #dee2e6 !important;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-save {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="/projeto/bd/bd-usuario.php" method="post">
            <input type="hidden" id="id_usuario" name="id_usuario">
            <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR"?>">
            <fieldset class="border p-3 rounded">
                <legend class="w-auto text-center p-1 border rounded"><?= ($id) ? "ALTERAÇÃO DE USUÁRIO" : "CADASTRO DE USUÁRIO" ?></legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input class="form-control" id="nome" name="nome" type="text" placeholder="Seu nome:"
                                value="<?= ($id) ? $user['nome'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input class="form-control" id="cpf" name="cpf" type="text" placeholder="Seu CPF:"
                                value="<?= ($id) ? $user['cpf'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nivel_acesso">Tipo de Login:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso" required>
                                <option value="">Selecione...</option>
                                <option value="1" <?= ($id && $user['nivel_acesso'] == 1) ? "selected" : "" ?>>Usuário</option>
                                <option value="0" <?= ($id && $user['nivel_acesso'] == 0) ? "selected" : "" ?>>Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dn">Data De Nascimento:</label>
                            <input class="form-control" id="dn" name="dn" type="date" placeholder="dd/mm/yyyy:"
                                value="<?= ($id) ? $user['data_nascimento'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input class="form-control" id="email" name="email" type="e-mail" placeholder="Seu E-mail:"
                                value="<?= ($id) ? $user['email'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <!-- pesquisar como é o jeito ideal pra passwords começando aqui? -->
                            <input class="form-control" id="senha" name="senha" type="password" placeholder="Sua Senha:"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirmarsenha">Confirmar Senha:</label>
                            <input class="form-control" id="confirmarsenha" name="confirmarsenha" type="password"
                                placeholder="Repita Sua Senha:" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input class="form-control" id="telefone" name="telefone" type="number" placeholder="Seu Telefone:"
                                value="<?= ($id) ? $user['telefone'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cep">Cep:</label>
                            <input class="form-control" id="cep" name="cep" type="Number" placeholder="Seu Cep:"
                                value="<?= ($id) ? $user['cep'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Estado que mora:</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="">Selecione...</option>
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
                                <!-- Coloque as opções de estado aqui -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input class="form-control" id="endereco" name="endereco" type="text" placeholder="Endereço:"
                                value="<?= ($id) ? $user['endereco'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input class="form-control" id="cidade" name="cidade" type="text" placeholder="Cidade que mora:"
                                value="<?= ($id) ? $user['cidade'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ncasa">Número da casa:</label>
                            <input class="form-control" id="ncasa" name="ncasa" type="number" placeholder="Número da casa:"
                                value="<?= ($id) ? $user['numero'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input class="form-control" id="complemento" name="complemento" type="text" placeholder="Complemento:"
                                value="<?= ($id) ? $user['complemento'] : null ?>">
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-save">Salvar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        
    </div>
    <!-- ctz q nao é footer aqui, lembrar de deixar responsivo quando acabar as partes importantes -->
    <footer class="footer bg-white border-top border-2 border-dark position-absolute w-100">
        <div class="container text-center py-3">
            Projeto desenvolvido por: Nikolas Arruda
        </div>
    </footer>
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
