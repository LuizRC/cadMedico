function listarMedicos() {
  /*Listar os dados do usuario */
  const response = document.getElementById("results");
  const url = 'http://127.0.0.1:80/cadMedico/controles/read.php';
  fetch(url, {
    method:"GET"
  }).then(response => response.text())
  .then(response => results.innerHTML = response)
}

listarMedicos();

