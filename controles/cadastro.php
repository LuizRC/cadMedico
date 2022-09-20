<?php 
header('Access-Control-Allow-Origin: *');

require_once('config.php');
session_start();

$nome = $_POST['nome'];
$crm = $_POST['crm'];
$telefone = $_POST['telefone'];
$especialidade = $_POST['especialidade'];

//verificar se todos os dados foram preenchidos
if(empty($nome) || empty($crm) || empty($especialidade) || empty($telefone)){
  echo json_encode(['mensagem' => "Todos os campos precisam ser preenchidos"]);
}else{

//verifcar se o usuario possuiu cadastro através do crm
$str = "SELECT * FROM medico WHERE crm='$crm'";

$response = $connection->query($str);

  if($response->num_rows > 0) {
  
    echo json_encode(["mensagem"=>"Médico(crm) já está cadastrado"]);

  }else {
    //cadstra o usuario após as verifcações de validação
    $sql = "INSERT INTO medico(nome, crm, telefone, especialidade) VALUES('".$nome."', '".$crm."', '".$telefone."', '".$especialidade."')";

    $result = $connection->query($sql);
    //verifica se houve algum erro ao cadastrar usuario
    if(!$result) {
      http_response_code(500);
      echo json_encode(["mensagem" => "Erro ao inserir no banco de dados"]);
    }else {
      http_response_code(200);
      echo json_encode(["mensagem" => "Cadastro realizado com sucesso!!"]);
    }

  }
}
