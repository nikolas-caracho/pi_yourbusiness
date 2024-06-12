global $conn;
require '../utils/conexao.php';

// Verifica se a conexão foi bem-sucedida
if (!isset($conn) || $conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepara a consulta SQL
$sql = "SELECT id, nome, razao_social, tamanho, fundacao, tributacao FROM produtos;";

// Executa a consulta SQL
$resultado = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if (!$resultado) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Produtos</title>
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

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
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

        .thead-dark th {
            background-color: #343a40;
            color: #ffffff;
            border-color: #ffffff;
        }

        .rounded {
            border-radius: 10px !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #495057;
        }

        .badge {
            border-radius: 10px;
            font-size: 12px;
            padding: 6px 10px;
        }

        .badge-primary {
            background-color: #007bff;
        }

        .badge-secondary {
            background-color: #6c757d;
        }

        .text-white {
            color: #ffffff !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="processar.php">
            <fieldset class="border bg-light p-3 rounded shadow">
                <legend class="w-auto p-1 border rounded">Lista De Produtos</legend>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="../dashboard.php" class="btn btn-primary">Voltar</a>
                    </div>
                    <div class="col-sm-4">
                        <label for="txt_nome">Nome:</label>
                        <input class="form-control" id="txt_nome" name="txt_nome" type="text" placeholder="Pesquise o Nome:">
                    </div>
                    <div class="col-sm-2">
                        <label for="txt_data_inicial">Data Inicial:</label>
                        <input class="form-control" id="txt_data_inicial" name="txt_data_inicial" type="date">
                    </div>
                    <div class="col-sm-2">
                        <label for="txt_data_final">Data Final:</label>
                        <input class="form-control" id="txt_data_final" name="txt_data_final" type="date">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary align-self-center">Buscar</button>
                    </div>
                </div>
            </fieldset>

            <table class="table rounded table-striped mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Ação</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Razão Social</th>
                        <th>Tamanho</th>
                        <th>Fundação</th>
                        <th>Tributação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($linha = $resultado->fetch_assoc()) {
                        ?>
                        <tr scope="row">
                            <td>
                                <a href="#excluir" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="cadastro_produto.php?id=<?= $linha['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                            <td><?= $linha['id'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                            <td><?= $linha['razao'] ?></td>
                            <td><?= $linha['tamanho'] ?></td>
                            <td><?= $linha['fundacao'] ?></td>
                            <td><?= $linha['tributacao'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <footer class="footer bg-white border-top border-2 border-dark mt-5">
        <div class="container text-center py-3">
            Projeto desenvolvido por: Nikolas Arruda
        </div>
    </footer>
</body>
</html>