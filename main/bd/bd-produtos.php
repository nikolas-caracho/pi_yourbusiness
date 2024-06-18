<?php
require "../utils/conexao.php";

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se os campos foram enviados e não estão vazios
$razao = isset($_POST['razao']) && !empty($_POST['razao']) ? $_POST['razao'] : "vazio";
$fundacao = isset($_POST['fundacao']) && !empty($_POST['fundacao']) ? $_POST['fundacao'] : null;
$ramo = isset($_POST['ramo']) && !empty($_POST['ramo']) ? $_POST['ramo'] : null;
$tamanho = isset($_POST['tamanho']) && !empty($_POST['tamanho']) ? $_POST['tamanho'] : null;
$tributos = isset($_POST['tributos']) && !empty($_POST['tributos']) ? $_POST['tributos'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

echo "Razão Social: " . $razao . "<br>";
echo "Fundação: " . $fundacao . "<br>";
echo "Ramo: " . $ramo . "<br>";
echo "Tamanho: " . $tamanho . "<br>";
echo "Tributos: " . $tributos . "<br>";
echo "Ação: " . $acao . "<br>";

if ($acao == "INCLUIR") {
    $sql = "INSERT INTO produtos (razao, fundacao, ramo, tamanho, tributos)
      VALUES (?, ?, ?, ?, ?);";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $razao, $fundacao, $ramo, $tamanho, $tributos);

    try {
        if ($stmt->execute()) {
            $idCadastro = $conn->insert_id;
            echo "ID do Cadastro: " . $idCadastro;
        } else {
            echo "Erro na execução: " . $stmt->error;
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
        ?>
        <script>
            history.back();
        </script>
        <?php
    }

    $stmt->close();
    $conn->close();

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else if ($acao == "ALTERAR") {
    // Adicione a lógica para atualização aqui
} else if ($acao == "DELETAR") {
    // Adicione a lógica para exclusão aqui
} else {
    header("Location: /pi_yourbusiness/");
    exit;
}
?>