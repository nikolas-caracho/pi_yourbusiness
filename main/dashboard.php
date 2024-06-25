<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Yourbusiness </title>
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
            max-width: 80%;
            height: auto;
            display: block;
            margin: 0 auto 20px;
            /* Centralizar a imagem */
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

        .rotating-logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 200px; /* Ajuste para tamanho desejado */
            height: 200px; /* Ajuste para tamanho desejado */
            border-radius: 50%;
            animation: rotate 4s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Administração</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            Usuários
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="usuarios/iu_usuario.php">Cadastro de usuário</a>
                            <a class="dropdown-item" href="usuarios/index.php">Lista de usuários</a>
                            <a class="dropdown-item" href="produtos/cadastro_produto.php">Cadastro de itens</a>
                            <a class="dropdown-item" href="produtos/lista_produtos.php">Lista de itens</a>
                        </div>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

    </nav>
    <div class="container">
        <div class="col-sm-12">
            <div>
                <img src="imgs/yourbusinesshere.png" class="rotating-logo" alt="...">
            </div>
        </div>
    </div>


    <footer class="footer bg-white border-top border-2 border-dark position-absolute w-100">
        <div class="container text-center py-3">
            Projeto desenvolvido por: Nikolas Arruda Caracho
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
