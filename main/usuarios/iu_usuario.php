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
    <div class="container">
        <form action="/projeto/bd/bd-usuario.php" method="post">
            <input type="hidden" id="id_usuario" name="id_usuario">
            <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
            <fieldset class="border p-3 rounded">
                <legend class="w-auto text-center border-rounded"><?= ($id) ? "ALTERAÇÃO DE USUÁRIO" : "CADASTRO DE USUÁRIO" ?></legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input class="form-control" id="nome" name="nome" type="text" placeholder="Seu nome:" value="<?= ($id) ? $user['nome'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input class="form-control" id="cpf" name="cpf" type="text" placeholder="Seu CPF:" value="<?= ($id) ? $user['cpf'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nivel_acesso">Tipo de Login:</label>
                            <select class="form-control" id="nivel_acesso" name="nivel_acesso" required>
                                <option value=""> -- Nível de Acesso --</option>
                                <option value="1" <?= (isset($_GET['id']) && $user['nivel_acesso'] == 1) ? "selected" : "" ?>>Admin</option>
                                <option value="2" <?= (isset($_GET['id']) && $user['nivel_acesso'] == 2) ? "selected" : "" ?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="data_nascimento">Data De Nascimento:</label>
                            <input class="form-control" id="data_nascimento" name="data_nascimento" type="date" placeholder="dd/mm/yyyy" value="<?= isset($id) ? date("Y-m-d", strtotime($user['data_nascimento'])) : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="Seu E-mail:" value="<?= ($id) ? $user['email'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input class="form-control" id="senha" name="senha" type="password" placeholder="Sua Senha:" <?= (isset($_GET['id'])) ? '' : 'required' ?>>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirmarsenha">Confirmar Senha:</label>
                            <input class="form-control" id="confirmarsenha" name="confirmarsenha" type="password" placeholder="Repita Sua Senha:" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Seu Telefone:" value="<?= ($id) ? $user['telefone'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cep">Cep:</label>
                            <input class="form-control" id="cep" name="cep" type="text" placeholder="Seu Cep:" value="<?= ($id) ? $user['cep'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Estado que mora:</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value=""> -- ESCOLHA --</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "AL") ? "selected" : '' ?>>AL</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "AP") ? "selected" : '' ?>>AP</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "AM") ? "selected" : '' ?>>AM</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "BA") ? "selected" : '' ?>>BA</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "CE") ? "selected" : '' ?>>CE</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "DF") ? "selected" : '' ?>>DF</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "ES") ? "selected" : '' ?>>ES</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "GO") ? "selected" : '' ?>>GO</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "MA") ? "selected" : '' ?>>MA</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "MT") ? "selected" : '' ?>>MT</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "MS") ? "selected" : '' ?>>MS</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "MG") ? "selected" : '' ?>>MG</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "PA") ? "selected" : '' ?>>PA</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "PB") ? "selected" : '' ?>>PB</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "PR") ? "selected" : '' ?>>PR</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "PE") ? "selected" : '' ?>>PE</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "PI") ? "selected" : '' ?>>PI</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "RJ") ? "selected" : '' ?>>RJ</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "RN") ? "selected" : '' ?>>RN</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "RS") ?                                 "selected" : '' ?>>RS</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "RO") ? "selected" : '' ?>>RO</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "RR") ? "selected" : '' ?>>RR</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "SC") ? "selected" : '' ?>>SC</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "SP") ? "selected" : '' ?>>SP</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "SE") ? "selected" : '' ?>>SE</option>
                                <option <?= (isset($_GET['id']) && $user['estado'] == "TO") ? "selected" : '' ?>>TO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input class="form-control" id="endereco" name="endereco" type="text" placeholder="Endereço:" value="<?= ($id) ? $user['endereco'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input class="form-control" id="cidade" name="cidade" type="text" placeholder="Cidade que mora:" value="<?= ($id) ? $user['cidade'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ncasa">Número da casa:</label>
                            <input class="form-control" id="ncasa" name="ncasa" type="text" placeholder="Número da casa:" value="<?= ($id) ? $user['numero'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input class="form-control" id="complemento" name="complemento" type="text" placeholder="Complemento:" value="<?= ($id) ? $user['complemento'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
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

