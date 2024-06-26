<?php
require "../utils/conexao.php";

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nome = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : null;
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
$confirmaSenha = isset($_POST['confirma_senha']) && !empty($_POST['confirma_senha']) ? $_POST['confirma_senha'] : null;
$idUsuario = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : null;

$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;
if($acao == null) {
    $acao = $_GET['acao'];
}
// Verificamos qual operação no BD está sendo feita.
if ($acao == "INCLUIR") {
    $sql = "INSERT INTO usuarios (nome, email, celular, data_nascimento, cpf, nivel_acesso, cep, endereco, numero, complemento, cidade, estado, senha) 
            VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
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

    try {
        if ($stmt->execute()) {
            $idCadastro = $conn->insert_id;
            echo $idCadastro;
            header("Location: /pi_yourbusiness/main/usuarios/index.php");
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar!";

    }

    $stmt->close();
    $conn->close();
    /* já fizemos o login no botao "Editar"
    (ir  no bd atraves de id e pegar todas as infos do usuario.
    login= pega o email do usuario e ao inves de fazer where id igual um numero, vc faz where email = email do usuario passado && senha = senha passada pelo usuario
    se voltar refgistro: login feito cm sucesso
    se nao voltar registros: login incorreto
    ) --> */
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else if ($acao == "ALTERAR") {
    if ($senha != "") {
        if($senha != $confirmaSenha)
            header("Location: /pi_yourbusiness/main/usuarios/iu_usuario.php?id=$idUsuario&invalido=1");
        $sql = "UPDATE usuarios SET 
                nome = ?, email = ?, celular = ?, data_nascimento = ?, cpf = ?, nivel_acesso = ?, cep = ?, endereco = ?, numero = ?, complemento = ?, cidade = ?, estado = ?, senha = ?
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
                nome = ?, email = ?, celular = ?, data_nascimento = ?, cpf = ?, nivel_acesso = ?, cep = ?, endereco = ?, numero = ?, complemento = ?, cidade = ?, estado = ?
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
            header("Location: /pi_yourbusiness/main/usuarios/index.php");
        } else {
            echo $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao ATUALIZAR!";
    }

    $stmt->close();
    $conn->close();
} else if ($acao == "DELETAR") {
    $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: /pi_yourbusiness/main/usuarios/index.php");
} else {
    header("Location: /pi-yourbusiness/main");
    exit;
}

?>

<!--       arrumar
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

a
    bind param com o sssis la

    -->