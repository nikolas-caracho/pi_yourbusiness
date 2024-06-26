<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>
    <?php
        require "../utils/conexao.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT id, nome, razaosocial, ramo, ano, tributacao, produto FROM produtos WHERE id = $id;";
            $resultado = $conn->query($sql)->fetch_assoc();
        }
    ?>
    <div class="container">
        <form action=<?= isset($_GET['id']) ? "/pi_yourbusiness/main/bd/bd-produtos.php?id=$id" : "/pi_yourbusiness/main/bd/bd-produtos.php" ?> method="post">
            <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
            <fieldset class="border bg-light p-3 rounded shadow">
                <legend class="w-auto text-center p-1 border rounded"> Cadastro De Produto</legend>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nome">Nome:</label>
                        <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome" value="<?= isset($resultado) ? $resultado['nome'] : ''?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="razao">Razão Social:</label>
                        <input class="form-control" id="razao" name="razaosocial" type="text" placeholder="Razão Social" value="<?= isset($resultado) ? $resultado['razaosocial'] : ''?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="fundacao">Ano de criação:</label>
                        <input class="form-control" id="fundacao" name="ano" type="number" placeholder="Ano de fundação" value="<?= isset($resultado) ? $resultado['ano'] : ''?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="ramo">Ramo:</label>
                        <input class="form-control" id="ramo" name="ramo" type="text" placeholder="Ramo" value="<?= isset($resultado) ? $resultado['ramo'] : ''?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="produto">Produto principal:</label>
                        <input class="form-control" id="produto" name="produto" type="text" placeholder="Produto" value="<?= isset($resultado) ? $resultado['produto'] : ''?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="uso">Sistema de tributação:</label>
                        <select class="form-control" id="tributacao" name="tributacao" required>
                            <option value="">Selecione...</option>
                            <option value="1" <?= isset($resultado) ? $resultado['tributacao'] == 1 ? 'selected' : '' : ''?>>Lucro presumido</option>
                            <option value="2" <?= isset($resultado) ? $resultado['tributacao'] == 2 ? 'selected' : '' : ''?>>Lucro real</option>
                        </select>
                    </div>
                    <div class="col-sm-6">

                    <div class="col-sm-12 d-flex justify-content-center">
                        <button type="submit" class="m-3 btn btn-success">Enviar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>