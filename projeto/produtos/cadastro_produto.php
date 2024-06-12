<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
            margin-top: 20px;
        }

        .container {
            background-color: #343a40;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .form-control {
            background-color: #495057;
            color: #ffffff;
            border-color: #495057;
        }

        .form-control:focus {
            background-color: #495057;
            color: #ffffff;
            border-color: #495057;
            box-shadow: none;
        }

        .border {
            border-color: #ffffff !important;
        }

        .text-center {
            color: #ffffff;
        }

        .text-primary {
            color: #007bff !important;
        }

        .bg-light {
            background-color: #6c757d !important;
        }

        .rounded {
            border-radius: 10px !important;
        }

        .shadow {
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="/projeto/bd/bd-produtos.php" method="post">
            <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
            <fieldset class="border bg-light p-3 rounded shadow">
                <legend class="w-auto text-center p-1 border rounded"> Cadastro De Produto</legend>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nome">Nome:</label>
                        <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome">
                    </div>
                    <div class="col-sm-6">
                        <label for="razao_social">Razão Social:</label>
                        <input class="form-control" id="razao" name="razao" type="text" placeholder="Razão Social">
                    </div>
                    <div class="col-sm-6">
                        <label for="fundacao">Ano de criação:</label>
                        <input class="form-control" id="fundacao" name="fundacao" type="" placeholder="Fundação">
                    </div>
                    <div class="col-sm-6">
                        <label for="ramo">Ramo:</label>
                        <input class="form-control" id="ramo" name="ramo" type="text" placeholder="Ramo">
                    </div>
                    <div class="col-sm-6">
                        <label for="tamanho">Tamanho do produto:</label>
                        <select class="form-control" id="tamanho" name="tamanho">
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="produto">Produto principal:</label>
                        <input class="form-control" id="produto" name="produto" type="text" placeholder="Produto">
                    </div>
                    <div class="col-sm-6">
                        <label for="uso">Sistema de tributação:</label>
                        <select class="form-control" id="tributacao" name="tributacao" required>
                            <option value="">Selecione...</option>
                            <option value="1">Lucro presumido</option>
                            <option value="0">Lucro real</option>
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

<footer class="footer bg-white border-top border-2 border-dark position-absolute w-100">
    <div class="container text-center py-3">
        Projeto desenvolvido por: Nikolas Arruda
    </div>
</footer>

</html>