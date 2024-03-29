<!DOCTYPE html>
<html lang="pt-br">
<?php 

    echo '<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    </head>';

    require("../../Model/conexao.php");
    $stmt = "SELECT * FROM usuario";
    $result = mysqli_query($con, $stmt);

 
    session_start();
    if((!isset ($_SESSION['cpf']) == true) and (!isset ($_SESSION['senha']) == true))
    {
      unset($_SESSION['cpf']);
      unset($_SESSION['senha']);
      header('location:../index.html');
      }
     
    $logado = $_SESSION['cpf'];



?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
                <a class="nav-link" href="#">
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
                    <li class="breadcrumb-item active">Usuário</li>
                </ol>

                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-user"></i> Lista de Usuário
                        <button class="btn-custom" onclick="window.location.href='cadastrar-usuario.php'"> Adicionar Usuário</button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>CPF</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Tipo</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>CPF</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Tipo</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($result)){
                                            echo "  <tr>
                                                        <td>".$row['CPF']."</td>
                                                        <td>".$row['nome']."</td>
                                                        <td>".$row['email']."</td>
                                                        <td>".$row['telefone']."</td>
                                                        <td>".$row['endereco']."</td>
                                                        <td>";
                                                        
                                                        if($row['tipo']==1)echo"Administrador";
                                                        else echo"Usuario Comum";
                                                        
                                                        echo '</td>
                                                        <td><a href="editar-usuario.php?cpf='.$row['CPF'].'"><img class="botaol" src="../edit.png"></a></td>                                                  
                                                        <td><img class="botaol"  onclick="aa()" src="../exc.png"></td>
                                                        <script> 
                                                        function aa(){
                                                            Swal.fire({
                                                                title: "Tem certeza?",
                                                                text: "Os dados serao deletados do sistema!",
                                                                type: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Sim, deletar!"
                                                              }).then((result) => {
                                                                if (result.value) {
                                                                  Swal.fire(
                                                                    "Deletado!",
                                                                    "Dados deletados com sucesso.",
                                                                    "success"
                                                                  )
                                                                  window.location="../../Controller/controllerUser.php?cpf='.$row['CPF'].'&acao=3";
                                                                }
                                                              })

                                                        }
                                                             </script>
                                                      </tr>';
                                        }
                                    ?>
                                   

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>

                <p class="small text-center text-muted my-5">
                    <em>More table examples coming soon...</em>
                </p>

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