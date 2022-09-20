<?php 
header('Access-Control-Allow-Origin: *');
require_once('config.php');

$id=$_POST['id'];

//verificar se existe o id do usuario
if(empty($id)) {
  echo json_encode((["messagem"=>"Não foi passado id"]));
}else{
  //remove o usuario pelo id 
  $sql= "DELETE FROM medico WHERE id='$id'";

  $response = $connection->query($sql);

  if($response === TRUE) {
    echo json_encode(["menssagem"=>"Médico excluido com sucesso!"]);
  } else {
    echo json_encode(["mensagem"=>"erro ao exlcuir"]);
  }
}
?>