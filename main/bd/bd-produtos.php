<?php
require "../utils/conexao.php";

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// Verifica se os campos foram enviados e não estão vazios
$nome = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : "";
$razaosocial = isset($_POST['razaosocial']) && !empty($_POST['razaosocial']) ? $_POST['razaosocial'] : "";
$ano = isset($_POST['ano']) && !empty($_POST['ano']) ? $_POST['ano'] : null;
$ramo = isset($_POST['ramo']) && !empty($_POST['ramo']) ? $_POST['ramo'] : "";
$produto = isset($_POST['produto']) && !empty($_POST['produto']) ? $_POST['produto'] : "";
$tributacao = isset($_POST['tributacao']) && !empty($_POST['tributacao']) ? $_POST['tributacao'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

if($acao == null && isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}


echo "Nome: " . $nome . "<br>";
echo "Razão Social: " . $razaosocial . "<br>";
echo "Ano de fundação: " . $ano . "<br>";
echo "Ramo empresarial: " . $ramo . "<br>";
echo "Produto principal: " . $produto . "<br>";
echo "Sistema tributário: " . $tributacao . "<br>";
echo "Ação: " . $acao . "<br>";

if ($acao == "INCLUIR") {
    $sql = "INSERT INTO produtos (nome, razaosocial, ano, ramo, produto, tributacao)
      VALUES (?, ?, ?, ?, ?, ?);";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssissi", $nome, $razaosocial, $ano, $ramo, $produto, $tributacao);
} else if ($acao == "ALTERAR") {
    if($id > 0) {
        $sql = "UPDATE produtos SET nome = ?, razaosocial = ?, ano = ?, ramo = ?, produto = ?, tributacao = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssissii", $nome, $razaosocial, $ano, $ramo, $produto, $tributacao, $id);
    }
} else if ($acao == "DELETAR") {
    if($id > 0) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i", $id);
    }
} else {
    header("Location: /pi-yourbusiness/main/");
    exit;
}

try {
    if ($stmt->execute()) {
        $idCadastro = $conn->insert_id;
        echo "ID do Cadastro: " . $idCadastro;
        header("Location: /pi_yourbusiness/main/produtos/lista_produtos.php");
    } else {
        echo "Erro na execução: " . $stmt->error;
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

$stmt->close();
$conn->close();

echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
