<?php

require("../../Model/conexao.php");

    $id = $_GET['id'];

	$sql = "SELECT * FROM chaves WHERE id_chave = '".$id."'";

	$result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    
    session_start();
    if((!isset ($_SESSION['cpf']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['cpf']);
  unset($_SESSION['senha']);
  header('location:../index.html');
  }
 

$logado = $_SESSION['cpf'];


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

    <title>SGC - Chaves</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="../home.php">SGC - Luiz</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../perfil/listar-perfil.php">Perfil</a>
                    <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="../../Controller/controllerLogout.php" >Sair</a>
                </div>
            </li>
        </ul>

    </nav>
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../home.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="listar-usuario.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuario</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../chaves/listar-chaves.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Chaves</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../distribuidor/listar-dis.php">
                    <i class="fas fa-fw fa-door"></i>
                    <span>Distribuidoras</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../fabricante/listar-fabri.php">
                    <i class="fas fa-fw fa-tool"></i>
                    <span>Fabricantes</span></a>
            </li>
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../home.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="listar-usuario.php">Chaves</a>
                    </li>
                    <li class="breadcrumb-item active">Editar Chaves</li>
                </ol>

                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-user"></i> Editar Chaves

                    </div>

                    <div class="card-body">
                        <div class="table">
                            <form method="POST" action="../../Controller/controllerCha.php?acao=2&id=<?php echo $id ?>">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-label-group">
                                                <input type="text" id="nome" name="num" class="form-control" placeholder="Nome Completo" required="required" autofocus="autofocus"  value="<?php echo $row['num_chave']; ?>" disabled>
                                                <label for="nome">Número da chave</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-label-group">
                                                <input type="number" id="cpf" class="form-control" name="quant" placeholder="CPF" required="required"  value="<?php echo $row['quantidade']; ?>" >
                                                <label for="cpf">Quantidade</label>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-label-group">
                                                <input type="text" id="cpf" class="form-control" name="pre" placeholder="CPF" required="required"  value="<?php echo $row['preco']; ?>" >
                                                <label for="cpf">Preço da chave</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div id="tipoUser">
                                    <b>Distribuidora:</b>
                                </div>
                    <select class="custom-select custom-select-lg mb-3" name="dis" disabled>
                    <?php 
                                        echo"<option selected>".$row['nome_distribuidora']."</option readonly>";
                                    ?>
                                   
                                    </select>
                                    <div id="tipoUser">
                                    <b>Fabricante:</b>
                                </div>
                                    <select class="custom-select custom-select-lg mb-3" name="fabri" disabled>
                                    <?php
                                        echo"<option selected>".$row['nome_frabricante']."</option readonly>";
                                    ?>
                                   
                                    </select>
                   
                    </div>
                    
                                   <input type="submit" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>

    </div>


    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>