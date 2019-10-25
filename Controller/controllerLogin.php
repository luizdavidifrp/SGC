<?php 





require("../Model/conexao.php");
session_start();

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

//$con = mysql_connect("localhost","root","root","sgc") or die ("Sem conexão com o servidor");
//$select = mysql_select_db("server") or die("Sem acesso ao DB, Entre em contato com o Administrador, gilson_sales@bytecode.com.br");
 

$result = mysqli_query($con,"SELECT * FROM usuario WHERE CPF=$cpf AND senha=$senha");

if(mysqli_num_rows($result)>0)
{
$_SESSION['cpf'] = $cpf;
$_SESSION['senha'] = $senha;


echo ('
<header>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</header>

<body background="../View/chaves.png"> 
<script>


Swal.fire({
  
  type: "success",
  title: "Sucesso",
  showConfirmButton: false,
  timer: 1500
})
setTimeout(home, 1500);

function home() {
  window.location="../View/home.html";
}
</script>');


}
else{

  
echo ('
<header>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</header>

<body background="../View/chaves.png"> 
<script> 

Swal.fire({
  type: "error",
  title: "Oops...",
  text: "Login e senha incorretos",
  showConfirmButton: false,
  timer: 1500
}) 
setTimeout(home, 1500);

function home() {
  window.location="../View/index.html";
}
</script>');
  unset ($_SESSION['cpf']);
  unset ($_SESSION['senha']);

   
  }

?>