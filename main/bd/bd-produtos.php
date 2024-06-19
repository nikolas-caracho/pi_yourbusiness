<?php
require "../utils/conexao.php";

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se os campos foram enviados e não estão vazios
$campo1 = isset($_POST['campo1']) && !empty($_POST['campo1']) ? $_POST['campo1'] : "vazio";
$campo2 = isset($_POST['campo2']) && !empty($_POST['campo2']) ? $_POST['campo2'] : null;
$campo3 = isset($_POST['campo3']) && !empty($_POST['campo3']) ? $_POST['campo3'] : null;
$campo4 = isset($_POST['campo4']) && !empty($_POST['campo4']) ? $_POST['campo4'] : null;
$campo5 = isset($_POST['campo5']) && !empty($_POST['campo5']) ? $_POST['campo5'] : null;
$acao = isset($_POST['acao']) && !empty($_POST['acao']) ? $_POST['acao'] : null;

echo "Campo 1: " . $campo1 . "<br>";
echo "Campo 2: " . $campo2 . "<br>";
echo "Campo 3: " . $campo3 . "<br>";
echo "Campo 4: " . $campo4 . "<br>";
echo "Campo 5: " . $campo5 . "<br>";
echo "Campo 6: " . $acao . "<br>";

if ($acao == "INCLUIR") {
    $sql = "INSERT INTO produtos (campo1, campo2, campo3, campo4, campo5)
      VALUES (?, ?, ?, ?, ?);";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $campo1, $campo2, $campo3, $campo4, $campo5);

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