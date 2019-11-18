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

        $num= $_POST['num'];
        $quant=$_POST['quant'];
        $preco= $_POST['pre'];
        $dis=$_POST['dis'];
        $fabri= $_POST['fabri'];
               


        $verChave=mysqli_query($con,"SELECT * FROM chaves WHERE num_chave='".$num."' AND nome_frabricante='".$fabri."' AND nome_distribuidora='".$dis."'");

    if(mysqli_num_rows($verChave)>1){

      echo '<script type="text/javascript">
      Swal.fire({
          type: "error",
          title: "Oops...",
          text: "Email Já Cadastrado!",
          showConfirmButton: false,
          timer: 1500
        }) 
        setTimeout(home, 10);
        
        function home() {
          window.location="../View/chaves/cadastrar-chaves.php";
        }
          </script>
      ';    

    }
else{
                 
        $result_usuario = "INSERT INTO chaves (id_chave,num_chave,quantidade,preco,nome_frabricante,nome_distribuidora) VALUES (NULL,'".$num."','".$quant."','".$preco."','".$fabri."','".$dis."')";
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
                      setTimeout(home, 10);
                      
                      function home() {
                        window.location="../View/chaves/listar-chaves.php";
                      }
                        </script>
                    ';    
                }else{                    
                    echo '<script type="text/javascript">
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "ERRO!",
                        showConfirmButton: false,
                        timer: 1500
                      }) 
                      setTimeout(home, 10);
                      
                      function home() {
                        window.location="../View/chaves/cadastrar-chaves.php";
                      }
                        </script>
                    ';    
                }
        
        }
        
        break;

        case 2:

          $id=$_GET['id'];

       
        $quant=$_POST['quant'];
        $preco= $_POST['pre'];
    

        $result_usuario = "UPDATE chaves SET quantidade='$quant',preco='$preco' WHERE id_chave='$id'";
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
                        window.location="../View/chaves/listar-chaves.php";
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
                      setTimeout(home, 10);
                      
                      function home() {
                        window.location="../View/chaves/editar-chaves.php";
                      }
                        </script>
                    '; }   
               
              break;

              case 3:

              $id=$_GET['id'];

              $deletar=mysqli_query($con,"DELETE FROM chaves WHERE id_chave='".$id."'");

              if($deletar){

                echo '<script>window.location="../View/chaves/listar-chaves.php"</script>'; 
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
                        window.location="../View/chaves/listar-chaves.php";
                      }
                        </script>
                    '; 
              }

              break;            
        
        }
 
?>