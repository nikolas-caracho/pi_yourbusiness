<?php
// No PHP temos como importar codigos de outros arquivos . php
// podemos utilizar o require / require_once
// ou include /include_once
//require obriga o carregamento do arquivo, se nao mata o PHP
//include tenta incluir o arquivo, se nao consegue mata exibe um erro
//_once verifica se o arquivo ja foi incluido anteriormente e importa somente se não
require 'utils/conexao.php';

// arrumar index
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yourbusiness</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        /* Seus estilos personalizados aqui */
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        .form-container {
            background-color: #343a40;
            color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
        }

        .logo {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 20px; /* Centralizar a imagem */
        }

        .titulo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <img src="https://busyability.org.au/wp-content/uploads/2021/04/yourbusinesshere.jpeg" class="img-fluid logo" alt="Logo">
                    <h2 class="titulo">LOGIN</h2>
                    <form  method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                        </div>
                        <a href="dashboard.php" type="submit" class="btn btn-success btn-block">Entrar</a>
                        <div class="mt-3">
                            <a href="#" class="text-white mr-3">Esqueci a Senha</a>
                            <span class="float-right"><a href="index.php" class="text-white">Cadastrar</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-white border-top border-2 border-dark position-absolute w-100">
        <div class="container text-center py-3">
            Projeto desenvolvido por: Nikolas Arruda
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
