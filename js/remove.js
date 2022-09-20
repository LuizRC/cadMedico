function remove(id) {
  /*remover os dados do usuario  */
  const form = new FormData();

  form.append('id', id);

  const url = 'http://127.0.0.1:80/cadMedico/controles/remove.php';
  
  fetch(url, {
    method:"POST",
    body: form
  }).then(r => {
    r.json().then(data => {
      alert(data.menssagem);
      listarMedicos();
    })
  }).catch(err => console.log(err))

};