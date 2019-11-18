<?php
session_start();
unset($_SESSION['cpf']);
session_destroy();

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

echo ('
<script>


Swal.fire({
  
  type: "success",
  title: "Deslogado com Sucesso",
  showConfirmButton: false,
  timer: 1500
})
setTimeout(home, 1500);

function home() {
  window.location=" ../View/index.html";
}
</script>');

exit;
?>