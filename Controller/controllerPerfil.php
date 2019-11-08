<?php
    require "../Model/conexao.php";
    $acao=$_GET['acao'];
    $emailG=$_GET['emailG'];
    
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

    switch($acao){

        
        case 1:

        $nome= $_POST['nome'];
        $cpf=$_POST['cpf'];
        $email= $_POST['email'];
        $end=$_POST['end'];
        $tel= $_POST['tel'];
             

       // include("../View/usuario/e-usuario.html");

             $verEmail=mysqli_query($con,"SELECT * FROM usuario WHERE email='".$email."'");

        if(mysqli_num_rows($verEmail)>0){

          if($email!=$emailG){
          echo '
         
          <script type="text/javascript">
          Swal.fire({
              type: "error",
              title: "Oops...",
              text: "Email Já Cadastrado!",
              showConfirmButton: false,
              timer: 1500
            }) 
            setTimeout(home, 10);
            
            function home() {
              window.location="../View/perfil/listar-perfil.php";
            }
              </script>
          ';    
          }
          else{

            $result_usuario = "UPDATE usuario SET telefone='$tel',endereco='$end',email='$email' WHERE CPF='$cpf'";
            $result=mysqli_query($con,$result_usuario);
    
            if($result){
                        echo '<script type="text/javascript">
                        Swal.fire({
      
                            type: "success",
                            title: "Atualizado com sucesso",
                            showConfirmButton: false,
                            timer: 1500
                          })
                          setTimeout(home, 10);
                          
                          function home() {
                            window.location="../View/perfil/listar-perfil.php";
                          }
                            </script>
                        ';    
                    }
                    else{                    
                        echo '<script type="text/javascript">
                        Swal.fire({
                            type: "error",
                            title: "Oops...",
                            text: "CPF Já Cadastrado!",
                            showConfirmButton: false,
                            timer: 1500
                          }) 
                          setTimeout(home, 10);
                          
                          function home() {
                            window.location="../View/perfil/listar-perfil.php";
                          }
                            </script>
                        ';    
                    }
            
          }
        }


              break;

             
        }
 
?>