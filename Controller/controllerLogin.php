<?php 


echo'
<header>
<!-- Custom fonts for this template-->
<link href="../View/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="../View/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../View/css/sb-admin.css" rel="stylesheet">
<link href="../View/css/custom.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

</header>

<body background="../View/chaves.png"> 
';

require("../Model/conexao.php");

session_start();

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


$result = mysqli_query($con,"SELECT * FROM usuario WHERE CPF=$cpf AND senha=$senha");

if(mysqli_num_rows($result)>0)
{
$_SESSION['cpf'] = $cpf;
$_SESSION['senha'] = $senha;


echo ('
<script>


Swal.fire({
  
  type: "success",
  title: "Sucesso",
  showConfirmButton: false,
  timer: 1500
})
setTimeout(home, 1500);

function home() {
  window.location="../View/home.php";
}
</script>');


}
else{

  
echo ('

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