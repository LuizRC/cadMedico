function createMedico() {
  /*Cadastrar os usuarios */
  const nome = document.getElementById('nome').value;
  const crm = document.getElementById('crm').value;
  const telefone = document.getElementById('telefone').value;
  const especialidade = document.getElementById('especialidade').value;

  const form = new FormData();

  form.append('nome', nome);
  form.append('crm', crm);
  form.append('telefone', telefone);
  form.append('especialidade', especialidade);
 
  const url = 'http://127.0.0.1:80/cadMedico/controles/cadastro.php';

  fetch(url,{
    method: 'POST',
    body: form
  }).then(r => {
    r.json().then(result => {
      alert(result.mensagem);
      document.getElementById('nome').value = "";
      document.getElementById('crm').value = "";
      document.getElementById('telefone').value = "";
      document.getElementById('especialidade').value = "";
    })
  }).catch(err => console.log(err))

};

