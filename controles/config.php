<?php 
header('Access-Control-Allow-Origin: *');

//conexão com o banco de dados
$host="localhost";
$user="root";
$password="";
$dbName="cadastromedico";

$connection = new mysqli($host, $user, $password, $dbName);

//verifca o status da conexão
if($connection -> connect_error) {
  die("Conexão Falhou" .$connectect->connect_error);
}
?>