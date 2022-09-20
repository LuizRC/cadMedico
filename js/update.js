function getId(id) {
 /*Pegar o id referente ao usuario e guarda no localstorage */
  const form = new FormData();
  form.append('id', id);

  const url = 'http://127.0.0.1:80/cadMedico/controles/get_id.php';
  
  fetch(url, {
    method:"POST",
    body: form
  }).then(r => {
    r.json().then(data => {
      window.localStorage.setItem('user', JSON.stringify(data));
      window.location.href="update.html";
    })
  })
}

userData();
function  userData() {
  /*Pega os dados no localStorage */
  const dados = JSON.parse(localStorage.getItem('user'));
  const usuario = dados[0]
  //console.log(user)
  document.getElementById('id').value = usuario.id;
  document.getElementById('nome_1').value = usuario.nome;
  document.getElementById('crm_1').value = usuario.crm;
  document.getElementById('telefone_1').value = usuario.telefone;
  document.getElementById('especialidade_1').value = usuario.especialidade;
}

function updateMedico() {
  /* Atualizar os dados do ususario */

  const id = document.getElementById('id').value
  const nome = document.getElementById('nome_1').value;
  const crm = document.getElementById('crm_1').value;
  const telefone = document.getElementById('telefone_1').value;
  const especialidade = document.getElementById('especialidade_1').value;

  const form = new FormData();
  
  form.append('id', id);
  form.append('nome', nome);
  form.append('crm', crm);
  form.append('telefone', telefone);
  form.append('especialidade', especialidade);

  const url = 'http://127.0.0.1:80/cadMedico/controles/update.php';

  fetch(url, {
    method:"POST",
    body: form
  }).then(r => {
    r.json().then(data => {
      console.log(data.mensagem)
      alert(data.mensagem)
      
      /* retorna pra lista do usuarios */
      window.location.href = 'listar.html';
      /*remove os dados do localstorage */
      window.localStorage.removeItem('user');
    })
  })
}


