<?php 
header('Access-Control-Allow-Origin: *');
require_once('config.php');
//selecionar os usuarios no banco de dados em orem crescente
$sql= "SELECT * FROM medico ORDER BY id ASC";

$resultado = $connection->query($sql);

//criar uma tabela com os dados do banco
if($resultado->num_rows > 0) {
  foreach($resultado as $row){
    echo"<tr>";
      echo"<td>".$row["nome"]."</td>";
      echo"<td>".$row["crm"]."</td>";
      echo"<td>".$row["especialidade"]."</td>";
      echo"<td>".$row["telefone"]."</td>";
      echo"<td class='d-flex align-items-center '>
        <button type='button' class='btn btn-success m-2' onclick=getId('".$row['id']."')>editar</button>
        <button type='button' class='btn btn-danger' onclick=remove('".$row['id']."')>excluir</button>
      </td>";
    echo"</tr>";
  }
}else {
  echo("");
}
?>
