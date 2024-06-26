<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yourbusiness</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        .form-container {
            background-color: #343a40;
            color: #ffffff;
            border-radius: 0px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
        }

        .logo {
            max-width: 100%;
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
            background-color: #aaaaaa;
            color: #343a40;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .rotating-logo {
            display: block;
            margin: auto;
            width: 150px;
            /* Começa menor */
            height: 50px;
            /* Começa menor */
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translate(-50%, -50%) perspective(1000px) rotateX(30deg) rotateY(30deg);
            animation: rotateAndMove forwards 7.5s;
            border-radius: 15px;
            /* Começa com bordas arredondadas */
        }

        @keyframes rotateAndMove {
            0% {
                transform: translate(-50%, -50%) perspective(1000px) rotateX(0deg) rotateY(0deg);
                width: 100px;
                height: 50px;
                border-radius: 15px;
                /* Manter bordas arredondadas no início */
            }

            50% {
                transform: translate(-50%, -50%) perspective(1000px) rotateX(360deg) rotateY(360deg);
                width: 200px;
                /* Aumenta de tamanho no meio */
                height: 100px;
                /* Aumenta de tamanho no meio */
                border-radius: 50px;
                /* Aumenta a borda arredondada para meio círculo */
            }

            100% {
                transform: translate(-50%, -50%) perspective(1000px) rotateX(720deg) rotateY(720deg);
                width: 200px;
                /* Mantém o tamanho maior */
                height: 200px;
                /* Mantém o tamanho maior */
                border-radius: 100px;
                /* Transforma em uma bola */

            }
        }
    </style>
</head>

<body>
    <br><br><br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <div class="row"><img src="imgs/yourbusinesshere.png" class="img-fluid logo rotating-logo" alt="Logo"></div>
                    <br>
                    <br>
                    <br>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['erro'])) {
                            echo '<div 
                            class="alert alert-danger" role="alert">
                        This is a danger alert—check it out! 
                                    </div>
            ';
                        }
                        ?>
                        <form method="POST" action="dashboard.php">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Entrar</button>
                            <div class="mt-3">
                                <a href="index.php" class="text-white mr-3">Esqueci a Senha</a>
                                <span class="float-right"><a href="index.php" class="text-white">Cadastrar</a></span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-white border-top border-2 border-dark position-absolute w-100">
        <div class="container text-center py-3">
            Projeto desenvolvido por: Nikolas Arruda Caracho
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>