<?php
require "../utils/conexao.php";

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null;
$celular = isset($_POST['celular']) && !empty($_POST['celular']) ? $_POST['celular'] : null;
$dataNascimento = isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
$cpf = isset($_POST['cpf']) && !empty($_POST['cpf']) ? $_POST['cpf'] : null;
$nivelAcesso = isset($_POST['nivel_acesso']) && !empty($_POST['nivel_acesso']) ? $_POST['nivel_acesso'] : null;
$cep = isset($_POST['cep']) && !empty($_POST['cep']) ? $_POST['cep'] : null;
$endereco = isset($_POST['endereco']) && !empty($_POST['endereco']) ? $_POST['endereco'] : null;
$numero = isset($_POST['numero']) && !empty($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) && !empty($_POST['complemento']) ? $_POST['complemento'] : null;
$cidade = isset($_POST['cidade']) && !empty($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) && !empty($_POST['estado']) ? $_POST['estado'] : null;
$senha = isset($_POST['senha']) && !empty($_POST['senha']) ? $_POST['senha'] : null;
$confirmaSenha = isset($_POST['confirma_senha']) && !empty($_POST['confirma_senha']) ? $_POST['confirma_senha'] : null;
$idUsuario = isset($_POST['id_usuario']) && !empty($_POST['id_usuario']) ? $_POST['id_usuario'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

// Verificamos qual operação no BD está sendo feita.
if ($acao == "INCLUIR") {
    // As ? serão trocadas pelos valores dos campos pelo PHP
    $sql = "INSERT INTO usuarios (nome, email, celular, data_nascimento, 
    cpf, nivel_acesso, cep, endereco, numero, complemento, cidade, estado, senha) 
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Utilizaremos o Prepare Statement para manipular os dados no BD
    // Esse recurso já possui proteção contra alguns ataques, como SQL INJETION
    // A função prepare, prepara o script SQL para ser manipulado pelo PHP
    $stmt = $conn->prepare($sql);

    // A função bind_param insere as variaveis no lugar das ?
    // O primeiro parametro é o tipo do dado, os demais são as variaveis com os dados.
    // i = inteiro, d = flutuante (casas decimais), s = texto (tudo que não é numero)
    $stmt->bind_param(
        "sssssisssssss",
        $nome,
        $email,
        $celular,
        $dataNascimento,
        $cpf,
        $nivelAcesso,
        $cep,
        $endereco,
        $numero,
        $complemento,
        $cidade,
        $estado,
        $senha
    );

    // A função execute envia o script SQL todo arrumado para o BD, com as variaveis
    // nos lugares das ?.
    try {
        if ($stmt->execute()) {
            // Pega o numero do ID que foi inserido no BD
            $idCadastro = $conn->insert_id;
            echo $idCadastro;

            header('Location: /pi-yourbusiness/main/usuarios');
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar!";
        // Vamos utilizar JS para poder recuperar os dados digitados
?>
        <script>
            history.back();
        </script>
    <?php
    }

    // Fecha o Prepared Statament
    $stmt->close();
    // Fecha a conexão
    $conn->close();

    // Exibe o POST caso o IF apresente erro.
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else if ($acao == "ALTERAR") {
    if ($senha != "") {
        $sql = "UPDATE usuarios SET 
        nome = ?, 
        email = ?, 
        celular = ?, 
        data_nascimento = ?, 
        cpf = ?, 
        nivel_acesso = ?, 
        cep = ?, 
        endereco = ?, 
        numero = ?, 
        complemento = ?, 
        cidade = ?, 
        estado = ?, 
        senha = ?
        WHERE id_usuario = ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssssisssssssi",
            $nome,
            $email,
            $celular,
            $dataNascimento,
            $cpf,
            $nivelAcesso,
            $cep,
            $endereco,
            $numero,
            $complemento,
            $cidade,
            $estado,
            $senha,
            $idUsuario
        );
    } else {
        $sql = "UPDATE usuarios SET 
        nome = ?, 
        email = ?, 
        celular = ?, 
        data_nascimento = ?, 
        cpf = ?, 
        nivel_acesso = ?, 
        cep = ?, 
        endereco = ?, 
        numero = ?, 
        complemento = ?, 
        cidade = ?, 
        estado = ?
        WHERE id_usuario = ?;";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssssissssssi",
            $nome,
            $email,
            $celular,
            $dataNascimento,
            $cpf,
            $nivelAcesso,
            $cep,
            $endereco,
            $numero,
            $complemento,
            $cidade,
            $estado,
            $idUsuario
        );
    }

    try {
        if ($stmt->execute()) {
            header('Location: /pi_yourbusiness/main/usuarios');
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao ATUALIZAR!";
        // Vamos utilizar JS para poder recuperar os dados digitados
    ?>
        <script>
            history.back();
        </script>
<?php
    }

    // Fecha o Prepared Statament
    $stmt->close();
    // Fecha a conexão
    $conn->close();
} else if ($acao == "DELETAR") {
    // Neste bloco será excluido um registro que já existe no BD.

    $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    // Fecha o Prepared Statament
    $stmt->close();
    // Fecha a conexão
    $conn->close();

} else {
    // Se nenhuma das operações for solicitada, volta para o inicio do site.
    // A função header modifica o cabeçalho do navegador
    // Ao passar a propriedade location, definimos para qual URL o navegador deve ir.
    header("Location: /pi-yourbusiness/main");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
<!-- 
já fizemos o login no botao "Editar"
(ir  no bd atraves de id e pegar todas as infos do usuario.
login= pega o email do usuario e ao inves de fazer where id igual um numero, vc faz where email = email do usuario passado && senha = senha passada pelo usuario
se voltar refgistro: login feito cm sucesso
se nao voltar registros: login incorreto
) -->
<body>
    <div class="container">
        <form method="post" action="conexao.php">
            <fieldset class="border bg-light p-3 rounded shadow">
                <legend class="w-auto p-1 border rounded">Lista De Produtos</legend>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="../dashboard.php">
    </body>
<!--      
    try {
    if ($stmt)}
    $stmt -> bind_param(
    )
    id do usuario no final dos dois bind param
    e as variavies do bd-usuario sao, nessa ordem:
    nome
    email
    celular
    datanascimento
    cpf
    nivel acesso
    cep
    endereco
    numero
    complemento
    cidade
    estado
    confirmasenha
    idusuario

    acao


    bind param com o sssis la

    -->
    <!--  -->