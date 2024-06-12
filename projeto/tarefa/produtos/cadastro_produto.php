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
        <form action="/tarefa/bd/bd-produtos.php" method="post">
            <input type="hidden" id="id_usuario" name="id_usuario">
            <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id'])? "ALTERAR" : "INCLUIR"?>">
            <fieldset class="border bg-light p-3 rounded shadow">
                <legend class="w-auto text-center p-1 border rounded"> Cadastro De Produto</legend>
                <div class= " row">
                    <div class="col-sm-12">
                        <a href="../dashboard.php">
                            <button type="button" class="algn btn btn-primary">Voltar</button> 
                        </a>   
                    </div>
                    <div class="col-sm-6">
                        <label for="txt_nome">Nome:</label>
                        <input class="form-control" id="nome" name="nome" type="text" placeholder="nome:">
                    </div>
                    <div class="col-sm-6">
                        <label for="txt_cpf">Marca:</label>
                        <input class="form-control" id="marca" name="marca" type="text" placeholder="marca:">
                    </div>
            
                    <div class="col-sm-6">
                        <label for="txt_DN">Preço:</label>
                        <input class="form-control" id="preco" name="preco" type="number" placeholder="preco:">
                    </div>

                    <div class="col-sm-6">
                        <label for="txt_E-mail">produto:</label>
                        <input class="form-control" id="produto" name="produto" type="e-mail" placeholder="produto:">
                    </div>

                    <div class="col-sm-12">
                        <label for="txt_Genero">novo ou usado:</label>
                        <select class="form-control" id="uso" name="uso" required>
                            <option value="">Selecione...</option>
                            <option value="1">novo</option>
                            <option value="0">usado</option>
                        </select>
                    </div>

                    <div class="col-sm-12 d-flex justify-content-center">
                            <button type="submit" class="m-3 btn btn-success center">Enviar</button> 
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