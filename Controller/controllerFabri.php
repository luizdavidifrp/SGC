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
    ';

    switch($acao){

        case 1:

        $nome= $_POST['nome'];
        $end=$_POST['end'];
        $tel= $_POST['tel'];
             

        include("../View/fabricante/cadastrar-fabri.html");

                
        $result_usuario = "INSERT INTO fabricante (id_frabricante,nome,telefone,endereco) VALUES (NULL,'".$nome."','".$tel."','".$end."')";
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
                        window.location="../View/fabricante/listar-fabri.php";
                      }
                        </script>
                    ';    
                }else{                    
                    echo '<script type="text/javascript">
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "ERROR",
                        showConfirmButton: false,
                        timer: 1500
                      }) 
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/fabricante/cadastrar-fabri.html";
                      }
                        </script>
                    ';    
                }
        
        break;

        case 2:
        
        $id=$_GET['id'];
        $nome= $_POST['nome'];
        $end=$_POST['end'];
        $tel= $_POST['tel'];
        

        include("../View/fabricante/cadastrar-fabri.html");

        $result_usuario = "UPDATE fabricante SET nome='$nome',telefone='$tel',endereco='$end' WHERE id_frabricante='$id'";
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
                        window.location="../View/fabricante/listar-fabri.php";
                      }
                        </script>
                    ';    
                }
                else{                    
                    echo '<script type="text/javascript">
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "ERROR",
                        showConfirmButton: false,
                        timer: 1500
                      }) 
                      setTimeout(home, 1500);
                      
                      function home() {
                        window.location="../View/fabricante/editar-fabri.php";
                      }
                        </script>
                    ';    
                }
              

              break;

              case 3:

              $id=$_GET['id'];

              $deletar=mysqli_query($con,"DELETE FROM fabricante WHERE id_frabricante='".$id."'");

              if($deletar){

                echo '<script>window.location="../View/fabricante/listar-fabri.php"</script>'; 
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
                        window.location="../View/fabricante/listar-fabri.php";
                      }
                        </script>
                    '; 
              }

              break;            
        
        }
 
?>