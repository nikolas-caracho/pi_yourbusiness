<?php
require "../utils/conexao.php";

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$acao = isset($_POST['acao']) ? $_POST['acao'] : null;
$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$nivel_acesso = isset($_POST['nivel_acesso']) ? $_POST['nivel_acesso'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($acao == "INCLUIR") {
        $sql = "INSERT INTO usuarios (nome, email, telefone, data_nascimento, cpf, nivel_acesso, cep, endereco, numero, complemento, cidade, estado, senha) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bind_param("sssssssssssss", $nome, $email, $telefone, $data_nascimento, $cpf, $nivel_acesso, $cep, $endereco, $numero, $complemento, $cidade, $estado, $hashed_password);

        try {
            if ($stmt->execute()) {
                $idCadastro = $conn->insert_id;
                echo "ID do Cadastro: " . $idCadastro;
            } else {
                echo "Erro na execução: " . $stmt->error;
            }
        } catch (Exception $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            echo '<script>history.back();</script>';
        }

        $stmt->close();
    } elseif ($acao == "ALTERAR") {
        if ($senha) {
            $sql = "UPDATE usuarios SET nome = ?, email = ?, telefone = ?, data_nascimento = ?, cpf = ?, nivel_acesso = ?, cep = ?, endereco = ?, numero = ?, complemento = ?, cidade = ?, estado = ?, senha = ? WHERE id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
            $stmt->bind_param("sssssssssssssi", $nome, $email, $telefone, $data_nascimento, $cpf, $nivel_acesso, $cep, $endereco, $numero, $complemento, $cidade, $estado, $hashed_password, $id_usuario);
        } else {
            $sql = "UPDATE usuarios SET nome = ?, email = ?, telefone = ?, data_nascimento = ?, cpf = ?, nivel_acesso = ?, cep = ?, endereco = ?, numero = ?, complemento = ?, cidade = ?, estado = ? WHERE id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssssi", $nome, $email, $telefone, $data_nascimento, $cpf, $nivel_acesso, $cep, $endereco, $numero, $complemento, $cidade, $estado, $id_usuario);
        }

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        try {
            if ($stmt->execute()) {
                echo "Usuário atualizado com sucesso.";
            } else {
                echo "Erro na execução: " . $stmt->error;
            }
        } catch (Exception $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
            echo '<script>history.back();</script>';
        }

        $stmt->close();
    } elseif ($acao == "DELETAR") {
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("i", $id_usuario);

        try {
            if ($stmt->execute()) {
                echo "Usuário deletado com sucesso.";
            } else {
                echo "Erro na execução: " . $stmt->error;
            }
        } catch (Exception $e) {
            echo "Erro ao deletar: " . $e->getMessage();
            echo '<script>history.back();</script>';
        }

        $stmt->close();
    } else {
        header("Location: /pi_yourbusiness/");
        exit;
    }

    $conn->close();
}

$sql = "SELECT id, nome, razao, tamanho, fundacao, tributacao FROM produtos;";
$resultado = $conn->query($sql);
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
        body { background-color: #343a40; color: #ffffff; margin-top: 20px; }
        .container { background-color: #343a40; border-radius: 10px; padding: 20px; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75); }
        .btn-primary { background-color: #007bff; border-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
        .btn-danger { background-color: #dc3545; border-color: #dc3545; }
        .btn-danger:hover { background-color: #c82333; border-color: #bd2130; }
        .btn-secondary { background-color: #6c757d; border-color: #6c757d; }
        .btn-secondary:hover { background-color: #5a6268; border-color: #545b62; }
        .form-control { background-color: #495057; color: #ffffff; border-color: #495057; }
        .form-control:focus { background-color: #495057; color: #ffffff; border-color: #495057; box-shadow: none; }
        .border { border-color: #ffffff !important; }
        .thead-dark th { background-color: #343a40; color: #ffffff; border-color: #ffffff; }
        .rounded { border-radius: 10px !important; }
        .table-striped tbody tr:nth-of-type(odd) { background-color: #495057; }
        .badge { border-radius: 10px; font-size: 12px; padding: 6px 10px; }
        .badge-primary { background-color: #007bff; }
        .badge-secondary { background-color: #6c757d; }
        .text-white { color: #ffffff !important; }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="conexao.php">
            <fieldset class="border bg-light p-3 rounded shadow">
                <legend class="w-auto p-1 border rounded">Lista De Produtos</legend>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="../../projeto/dashboard.php

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


    bind param com o sssis la n sei fazer

    -->
