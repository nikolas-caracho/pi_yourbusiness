<?php
//este arquivo será responsavel por conectar o PHP com o BD
//Será importado (requerido toda vez que precisarmos de uma conexao)

$host = 'localhost'; //Endereço ou IP onde está o BD
$bdName = 'pi_yourbusiness'; //Nome do banco de dados que desejamos conectar
$usuario = 'root'; // nome do usuario para conexao do XAMPP root pe o padrão
$senha = ''; // $senha do usuario. no XAMPP é em branco

//A variavel conn ira armazena a instancia da conexão
// o mysql e responsavel por fazer a conexao com o mysql/mariadb
$conn = new mysqli($host, $usuario, $senha, $bdName);

//verifica se ouve erro na conexão
if($conn->connect_error){
    //a função die mata a execução do PHP
    die("erro ao conectar com o BD:" . $conn->connect_error);
}