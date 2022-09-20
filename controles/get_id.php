<?php 
header('Access-Control-Allow-Origin: *');
require_once('config.php');

//pegar o id do usuario no banco de dados
$id = $_POST['id'];

if(empty($id)) {
  echo json_encode((["messagem"=>"Não foi passado id"]));
}else{

  //selecionar o id no banco de dados
  $sql= "SELECT * FROM medico WHERE id='$id'";

  $response = $connection->query($sql);
  $rows = array();

  if($response->num_rows > 0) {
    foreach($response as $r){
      $rows[] = $r;
    }

    echo json_encode($rows);
  } else {
    echo json_encode(["mensagem"=>"não exite usuario com este id"]);
  }
}
?>