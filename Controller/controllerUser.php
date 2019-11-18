<?php
    require "../Model/conexao.php";
    $acao=$_GET['acao'];
    
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
        $senha=$_POST['senha'];
        $confirmaSenha= $_POST['confirmaSenha'];
        $end=$_POST['end'];
        $tel= $_POST['tel'];
        $tipo=$_POST['tipoUser'];
        


        $verEmail=mysqli_query($con,"SELECT * FROM usuario WHERE email='".$email."'");

    if(mysqli_num_rows($verEmail)>1){

      echo '<script type="text/javascript">
      Swal.fire({
          type: "error",
          title: "Oops...",
          text: "Email Já Cadastrado!",
          showConfirmButton: false,
          timer: 1500
        }) 
        setTimeout(home, 1500);
        
        function home() {
          window.location="../View/usuario/cadastrar-usuario.php";
        }
          </script>
      ';    

    }
else{
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
                        text: "CPF Já Cadastrado!",
                        showConfirmButton: false,
                        timer: 1500
                      }) 
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/usuario/cadastrar-usuario.php";
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
                window.location="../View/usuario/cadastrar-usuario.php";
              }
            </script>
        ';

        }
      }
        break;

        case 2:

        $nome= $_POST['nome'];
        $cpf=$_POST['cpf'];
        $email= $_POST['email'];
        $end=$_POST['end'];
        $tel= $_POST['tel'];
        $tipo=$_POST['tipoUser'];
        

       

        $verEmail=mysqli_query($con,"SELECT * FROM usuario WHERE email='".$email."'");

        if(mysqli_num_rows($verEmail)>0){
    
          echo '<script type="text/javascript">
          Swal.fire({
              type: "error",
              title: "Oops...",
              text: "Email Já Cadastrado!",
              showConfirmButton: false,
              timer: 1500
            }) 
            setTimeout(home, 1500);
            
            function home() {
              window.location="../View/usuario/listar-usuario.php";
            }
              </script>
          ';    
    
        }
    else{

        $result_usuario = "UPDATE usuario SET telefone='$tel',endereco='$end',tipo='$tipo',email='$email' WHERE CPF='$cpf'";
        //$resultado_usuario = mysqli_query($con, $result_usuario);
        $result=mysqli_query($con,$result_usuario);

        if($result){
                    echo '<script type="text/javascript">
                    Swal.fire({
  
                        type: "success",
                        title: "Atualizado com sucesso",
                        showConfirmButton: false,
                        timer: 1500
                      })
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/usuario/listar-usuario.php";
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
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/usuario/editar-usuario.php";
                      }
                        </script>
                    ';    
                }
              }

              break;

              case 3:

              $cpf=$_GET['cpf'];

              $deletar=mysqli_query($con,"DELETE FROM usuario WHERE CPF='".$cpf."'");

              if($deletar){

                echo '<script>window.location="../View/usuario/listar-usuario.php"</script>'; 
              }else{
                echo '<script type="text/javascript">
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "ERRO!",
                        showConfirmButton: false,
                        timer: 1500
                      }) 
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/usuario/listar-usuario.php";
                      }
                        </script>
                    '; 
              }

              break;            
        
        }
 
?>