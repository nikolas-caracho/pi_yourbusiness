<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <?php 
        require "../utils/conexao.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT id_usuario, celular, cep, cidade, complemento, cpf, data_nascimento, email, endereco, estado, nivel_acesso, nome, numero, senha FROM usuarios WHERE id_usuario = $id;";
            $user = $conn->query($sql)->fetch_assoc();
        }

        if(isset($_GET['invalido'])){
            $invalido = $_GET['invalido'];
        }
    ?>
    <div class="container">
        <form action=<?= isset($_GET['id']) ? "/pi_yourbusiness/main/bd/bd-usuario.php?id=$id" : "/pi_yourbusiness/main/bd/bd-usuario.php" ?> method="post">
            <input type="hidden" id="id_usuario" name="id_usuario">
            <input type="hidden" id="acao" name="acao" value="<?= isset($user) ? "ALTERAR" : "INCLUIR" ?>">
            <fieldset class="border p-3 rounded">
                <legend class="w-auto text-center border-rounded"><?= isset($user) ? "ALTERAÇÃO DE USUÁRIO" : "CADASTRO DE USUÁRIO" ?></legend>
                <?php
                    if(isset($invalido) && $invalido == 1)
                        echo '<div class="col-md-12 text-center" style="color: red"> Senha e Confirmar senha devem ser iguais </div>';
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input class="form-control" id="nome" name="nome" type="text" placeholder="Seu nome:" value="<?= isset($user) ? $user['nome'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input class="form-control" id="cpf" name="cpf" type="text" placeholder="Seu CPF:" value="<?= isset($user) ? $user['cpf'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nivel_acesso">Tipo de Login:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso" required>
                                <option value=""> -- Nível de Acesso --</option>
                                <option value="1" <?= (isset($user) && $user['nivel_acesso'] == 1) ? "selected" : "" ?>>Admin</option>
                                <option value="0" <?= (isset($user) && $user['nivel_acesso'] == 0) ? "selected" : "" ?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="data_nascimento">Data De Nascimento:</label>
                            <input class="form-control" id="data_nascimento" name="data_nascimento" type="date" placeholder="dd/mm/yyyy" value="<?= isset($user) ? date("Y-m-d", strtotime($user['data_nascimento'])) : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="Seu E-mail:" value="<?= isset($user) ? $user['email'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input class="form-control" id="senha" name="senha" type="password" placeholder="Sua Senha:" <?= (isset($user)) ? '' : 'required' ?>>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirmarsenha">Confirmar Senha:</label>
                            <input class="form-control" id="confirmarsenha" name="confirmarsenha" type="password" placeholder="Repita Sua Senha:" <?= (isset($user)) ? '' : 'required' ?>>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input class="form-control" id="telefone" name="celular" type="tel" placeholder="Seu Telefone:" value="<?= isset($user) ? $user['celular'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cep">Cep:</label>
                            <input class="form-control" id="cep" name="cep" type="text" placeholder="Seu Cep:" value="<?= isset($user) ? $user['cep'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Estado que mora:</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value=""> -- ESCOLHA --</option>
                                <option <?= (isset($user) && $user['estado'] == "1") ? "selected" : '' ?> value='1'>AC</option>
                                <option <?= (isset($user) && $user['estado'] == "2") ? "selected" : '' ?> value='2'>AL</option>
                                <option <?= (isset($user) && $user['estado'] == "3") ? "selected" : '' ?> value='3'>AP</option>
                                <option <?= (isset($user) && $user['estado'] == "4") ? "selected" : '' ?> value='4'>AM</option>
                                <option <?= (isset($user) && $user['estado'] == "5") ? "selected" : '' ?> value='5'>BA</option>
                                <option <?= (isset($user) && $user['estado'] == "6") ? "selected" : '' ?> value='6'>CE</option>
                                <option <?= (isset($user) && $user['estado'] == "7") ? "selected" : '' ?> value='7'>DF</option>
                                <option <?= (isset($user) && $user['estado'] == "8") ? "selected" : '' ?> value='8'>ES</option>
                                <option <?= (isset($user) && $user['estado'] == "9") ? "selected" : '' ?> value='9'>GO</option>
                                <option <?= (isset($user) && $user['estado'] == "10") ? "selected" : '' ?> value='10'>MA</option>
                                <option <?= (isset($user) && $user['estado'] == "11") ? "selected" : '' ?> value='11'>MT</option>
                                <option <?= (isset($user) && $user['estado'] == "12") ? "selected" : '' ?> value='12'>MS</option>
                                <option <?= (isset($user) && $user['estado'] == "13") ? "selected" : '' ?> value='13'>MG</option>
                                <option <?= (isset($user) && $user['estado'] == "14") ? "selected" : '' ?> value='14'>PA</option>
                                <option <?= (isset($user) && $user['estado'] == "15") ? "selected" : '' ?> value='15'>PB</option>
                                <option <?= (isset($user) && $user['estado'] == "16") ? "selected" : '' ?> value='16'>PR</option>
                                <option <?= (isset($user) && $user['estado'] == "17") ? "selected" : '' ?> value='17'>PE</option>
                                <option <?= (isset($user) && $user['estado'] == "18") ? "selected" : '' ?> value='18'>PI</option>
                                <option <?= (isset($user) && $user['estado'] == "19") ? "selected" : '' ?> value='19'>RJ</option>
                                <option <?= (isset($user) && $user['estado'] == "20") ? "selected" : '' ?> value='20'>RN</option>
                                <option <?= (isset($user) && $user['estado'] == "21") ? "selected" : '' ?> value='21'>RS</option>
                                <option <?= (isset($user) && $user['estado'] == "22") ? "selected" : '' ?> value='22'>RO</option>
                                <option <?= (isset($user) && $user['estado'] == "23") ? "selected" : '' ?> value='23'>RR</option>
                                <option <?= (isset($user) && $user['estado'] == "24") ? "selected" : '' ?> value='24'>SC</option>
                                <option <?= (isset($user) && $user['estado'] == "25") ? "selected" : '' ?> value='25'>SP</option>
                                <option <?= (isset($user) && $user['estado'] == "26") ? "selected" : '' ?> value='26'>SE</option>
                                <option <?= (isset($user) && $user['estado'] == "27") ? "selected" : '' ?> value='27'>TO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input class="form-control" id="endereco" name="endereco" type="text" placeholder="Endereço:" value="<?= isset($user) ? $user['endereco'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input class="form-control" id="cidade" name="cidade" type="text" placeholder="Cidade que mora:" value="<?= isset($user) ? $user['cidade'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numero">Número da casa:</label>
                            <input class="form-control" id="numero" name="numero" type="text" placeholder="Número da casa:" value="<?= isset($user) ? $user['numero'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input class="form-control" id="complemento" name="complemento" type="text" placeholder="Complemento:" value="<?= isset($user) ? $user['complemento'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Incluir</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <footer class="footer bg-white border-top border-2 border-dark position-absolute w-100">
        <div class="container text-center py-3">
            Projeto desenvolvido por: Nikolas Arruda
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

