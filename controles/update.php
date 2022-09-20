<?php 
header('Access-Control-Allow-Origin: *');
require_once('config.php');

$id=$_POST['id'];
$nome = $_POST['nome'];
$crm = $_POST['crm'];
$telefone = $_POST['telefone'];
$especialidade = $_POST['especialidade'];

//verificar se todos os dados foram preenchidos
if(empty($nome) || empty($crm) || empty($especialidade) || empty($telefone)){
  echo json_encode(['mensagem' => "Todos os campos precisam ser preenchidos"]);
}else{
  //atualizar os dados do usuario no banco de dados
  $sql = "UPDATE medico SET nome='$nome', crm='$crm', telefone='$telefone', especialidade='$especialidade' WHERE id='$id'";

  $response = $connection->query($sql);

  if($response === TRUE) {
    echo json_encode(['mensagem' => "Medico atualizado com sucesso!!"]);
  }else{
    echo json_encode(['mensagem' => "Não foi possivel atualizar os dados"]);
  }
}

?>