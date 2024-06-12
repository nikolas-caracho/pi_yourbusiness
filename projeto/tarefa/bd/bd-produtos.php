<?php
require "../utils/conexao.php";


if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = $_POST['nome'] ;
}else{
    $nome = "vazio";
}


echo "nome: " . $nome . "<br>";

$marca = isset($_POST['marca'])&& !empty($_POST['marca'])? $_POST['marca'] : null;
echo "marca: " . $marca . "<br>";

$preco = isset($_POST['preco'])? $_POST['preco'] : null;
echo "preco: " . $preco . "<br>";

$produto = isset($_POST['produto'])&& !empty($_POST['produto'])? $_POST['produto'] : null;
echo "produto: " . $produto . "<br>";

$uso = isset($_POST['uso'])? $_POST['uso'] : null;
echo "uso: " . $uso . "<br>";


$acao = isset($_POST['acao']) && !empty($_POST['acao'])?  $_POST['acao'] : null;
echo "Ação: " . $acao;





if($acao == "INCLUIR"){
    $sql = "INSERT INTO produtos (nome, marca, preco, produto, uso)
      VALUES (?, ?, ?, ?, ?);";
  
    $stmt = $conn->prepare($sql);

 

    $stmt->bind_param("sssss", $nome, $marca, $preco, $produto, $uso);




    try{
        if ($stmt->execute()){
       
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

    echo "<pre>";
    print_r($_POST);
    echo "</prev>";
    
    
} else if ($acao == "alterar"){
    
} else if ($acao == "DELETAR"){
   
}else{
   
    header("locattion; /jaum/");
    exit;
}

?>