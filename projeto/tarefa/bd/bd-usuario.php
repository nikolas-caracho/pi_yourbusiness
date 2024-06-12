<?php
require "../utils/conexao.php";


if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = $_POST['nome'] ;
}else{
    $nome = "vazio";
}


echo "nome: " . $nome . "<br>";

$cpf = isset($_POST['cpf'])&& !empty($_POST['cpf'])? $_POST['cpf'] : null;
echo "cpf: " . $cpf . "<br>";

$nivel_acesso = isset($_POST['nivel_acesso'])? $_POST['nivel_acesso'] : null;
echo "nivel_acesso: " . $nivel_acesso . "<br>";

$dn = isset($_POST['dn'])&& !empty($_POST['dn'])? $_POST['dn'] : null;
echo "dn: " . $dn . "<br>";

$email = isset($_POST['email'])&& !empty($_POST['email'])? $_POST['email'] : null;
echo "email: " . $email . "<br>";

$senha = isset($_POST['senha'])&& !empty($_POST['senha'])? $_POST['senha'] : null;
echo "senha: " . $senha . "<br>";

$confirmarsenha = isset($_POST['confirmarsenha'])&& !empty($_POST['confirmarsenha'])? $_POST['confirmarsenha'] : null;
echo "confirmarsenha: " . $confirmarsenha . "<br>";

$telefone = isset($_POST['telefone'])&& !empty($_POST['telefone'])? $_POST['telefone'] : null;
echo "telefone: " . $telefone . "<br>";

$cep = isset($_POST['cep'])&& !empty($_POST['cep'])? $_POST['cep'] : null;
echo "cep: " . $cep . "<br>";

$estado = isset($_POST['estado'])&& !empty($_POST['estado'])? $_POST['estado'] : null;
echo "estado: " . $estado . "<br>";

$cidade = isset($_POST['cidade'])&& !empty($_POST['cidade'])? $_POST['cidade'] : null;
echo "cidade: " . $cidade . "<br>";

$complemento = isset($_POST['complemento'])&& !empty($_POST['complemento'])? $_POST['complemento'] : null;
echo "complemento: " . $complemento . "<br>";

$ncasa = isset($_POST['ncasa'])&& !empty($_POST['ncasa'])? $_POST['ncasa'] : null;
echo "ncasa: " . $ncasa . "<br>";

$endereco = isset($_POST['endereco'])&& !empty($_POST['endereco'])? $_POST['endereco'] : null;
echo "endereco: " . $endereco . "<br>";

$acao = isset($_POST['acao']) && !empty($_POST['acao'])?  $_POST['acao'] : null;
echo "Ação: " . $acao;

// verificamos qual operacao esta no BD esta sendo feita

if($acao == "INCLUIR"){
    $sql = "INSERT INTO usuarios (nome, nivel_acesso, cep, endereco, numero, complemento, cidade, estado, senha, email, telefone, data_nascimento, cpf)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
  
  // utilizaremos o prepare statement para manipular os dados no BD
    // esse recurso ja possui proteção contra alguns ataques, como SQL INJECTION
    // a função perpare, prepara o script SQL para ser manipulado pelo PHP
    $stmt = $conn->prepare($sql);

    // a função binda_param insere as variaveis no lugar das ?
    // o primeiro parametro é o tipo de dado, os demais são as variaveis com os dados
    // i = inteiro, d = flutuante (casa decimais), s = texto(tudo que não é numero)

    $stmt->bind_param("sisssssssssss", $nome, $nivel_acesso, $cep, $endereco, $ncasa,
                     $complemento, $cidade, $estado, $senha, $email, $telefone, $dn, $cpf);


    // a função execute envia o script SQL todo arrumado para o BD, com as variaveis nos ligares das ?

    try{
        if ($stmt->execute()){
        //pega o numero do ID que foi inserido no BD
        $idCadastro = $conn->insert_id;
        echo $idCadastro;

        



    }else{
        echo $stmt->error;
    }
    }catch (exeption $e){
        echo"erro ao cadastrar!";

        ?>
        <script>
            history.back();
        </script>
        <?php
    }

    $stmt->close();

    $conn->close();

    // neste bloco sera inserido um novo redistro no BD
    echo "<pre>";
    print_r($_POST);
    echo "</prev>";
    
    
} else if ($acao == "alterar"){
    //neste bloco sera alterado um registro que ja existe no BD
} else if ($acao == "DELETAR"){
    //neste bloco sera esculido um registro que ja existe no BD
}else{
    // Se nenhuma das operações for solicitada, para o inicio do site
    //a função header modifica o cabeçalho do navegador
    // ao passa a propriedade location, definimos para qual URL o navegador deve ir
    header("locattion; /jaum/");
    exit;
}

?>