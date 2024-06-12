<?php
// No PHP temos como importar codigos de outros arquivos . php
// podemos utilizar o require / require_once
// ou include /include_once
//require obriga o carregamento do arquivo, se nao mata o PHP
//include tenta incluir o arquivo, se nao consegue mata exibe um erro
//_once verifica se o arquivo ja foi incluido anteriormente e importa somente se não
require 'utils/conexao.php';
?>
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
    <div class="container d-flex justify-content-center">
        <fieldset class="border bg-light p-3 rounded shadow">
            <legend class="w-auto text-center p-1 border rounded">Login De Usuario</legend>
            <div class="row">
                    <div class="col-sm">
                    <label for="txt_User"></label>
                    <input class="form-control" id="txt_User" name="txt_Uer" type="text" placeholder="Usuario/Email:">
                </div>
            </div>
            <div class="row">
                    <div class="col-sm">
                        <label for="txt_User"></label>
                        <input class="form-control" id="txt_Senha" name="txt_Senha" type="text" placeholder="Senha:">
                    </div>
            </div class="row">
                    

                    <div class="col-sm d-flex justify-content-sm-center">
                        <a href="dashboard.php">
                            <button type="button" class="m-3 btn btn-success center">Entrar</button>  
                        </a>
                    </div>
                    <div class="col-sm d-flex justify-content-sm-center">
                        <a href="#">
                            <button type="button" class="m-3 btn btn-primary center">Esqueci a Senha</button>  
                        </a>
                    </div>
            </div>
        </fieldset>
    </div>

    
</body>
</html>