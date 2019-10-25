<?php
    require("../Model/conexao.php");
   
    

    $nome= $_POST['nome'];
    $cpf=$_POST['cpf'];
    $email= $_POST['email'];
    $senha=$_POST['senha'];
    $confirmaSenha= $_POST['confirmaSenha'];
    $end=$_POST['end'];
    $tel= $_POST['tel'];
    $tipo=$_POST['tipoUser'];
    $acao=$_POST['acao'];
   
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
    ';

    switch($acao){

        case 1:

        include("../View/usuario/usario.html");

        if($senha == $confirmaSenha){
          
        $result_usuario = "INSERT INTO usuario (CPF,senha,nome,telefone,endereco,tipo,email) VALUES ('".$cpf."','".$senha."','".$nome."','".$tel."','".$end."','".$tipo."','".$email."')";
        //$resultado_usuario = mysqli_query($con, $result_usuario);
        $result=mysqli_query($con,$result_usuario);

        if($result){
                    echo '<script type="text/javascript">
                    Swal.fire({
  
                        type: "success",
                        title: "Cadastrado com sucesso",
                        showConfirmButton: false,
                        timer: 1500
                      })
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/usuario/listar-usuario.php";
                      }
                        </script>
                    ';    
                }else{                    
                    echo '<script type="text/javascript">
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "Senha diferentes",
                        showConfirmButton: false,
                        timer: 1500
                      }) 
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/usuario/usario.php";
                      }
                        </script>
                    ';    
                }
        
        }
        else{
            

            echo '
            <script type="text/javascript">
            Swal.fire({
                type: "error",
                title: "Oops...",
                text: "Senha diferentes",
                showConfirmButton: false,
                timer: 1500
              }) 
              setTimeout(home, 1500);
              
              function home() {
                window.location="../View/usuario/usario.html";
              }
            </script>
        ';

        }
        
        break;

        case 2:

        
        









    }
 
?>