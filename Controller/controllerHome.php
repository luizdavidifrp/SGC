<?php
require("../Model/conexao.php");
$num=$_POST['num'];
$quant= $_POST['quant'];

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

$result_usuario = "UPDATE chaves SET quantidade= quantidade - '$quant' WHERE num_chave='$num'";
$result=mysqli_query($con,$result_usuario);

if($result){
            echo '<script type="text/javascript">
            Swal.fire({

                type: "success",
                title: "Atualizado com sucesso 12",
                showConfirmButton: false,
                timer: 1500
              })
              setTimeout(home, 1500);
        
        function home() {
          window.location="../View/home.php";
        }
              </script>
            ';    
        }
        else{                    
            echo '<script type="text/javascript">
            Swal.fire({
                type: "error",
                title: "Oops...",
                text: "ERRO!",
                showConfirmButton: false,
                timer: 1500
              }) 
              function home() {
                window.location="../View/home.php";
              }
              </script>
            '; }   
       
      ?>