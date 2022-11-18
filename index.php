<?php
    require_once "vendor/autoload.php";

    use Controller\Main;

    $controller = new Main();

    $active = $controller->getTotalActiveClients();
    $inactive = $controller->getTotalInactiveClients();

    $clients = $controller->getData();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clientes - P21 sistemas</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800">Lista de clientes</h1>

                        <div>
                            <a href="load-clients.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fa fa-plus"></i> Adicionar novo cliente
                            </a>
                            <a href="load-clients.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fa fa-upload"></i> Carregar novos clientes a partir de arquivo
                            </a>
                        </div>

                        

                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total active clients -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Clientes ativos
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $active['active'] ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total inactive clients -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Clientes inativos
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $inactive['inactive'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg mb-4">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Documento</th>
                                                    <th>CEP</th>
                                                    <th>Endereço</th>
                                                    <th>Bairro</th>
                                                    <th>Cidade</th>
                                                    <th>Estado</th>
                                                    <th>Phone</th>
                                                    <th>E-mail</th>
                                                    <th>Ativo</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Documento</th>
                                                    <th>CEP</th>
                                                    <th>Endereço</th>
                                                    <th>Bairro</th>
                                                    <th>Cidade</th>
                                                    <th>Estado</th>
                                                    <th>Phone</th>
                                                    <th>E-mail</th>
                                                    <th>Ativo</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                            <?php
                                                foreach($clients as $client): 
                                            ?>

                                                <tr>
                                                    <td><?= $client['name'] ?></td>
                                                    <td><?= $client['document'] ?></td>
                                                    <td><?= $client['zipcode'] ?></td>
                                                    <td><?= $client['address'] ?></td>
                                                    <td><?= $client['district'] ?></td>
                                                    <td><?= $client['city'] ?></td>
                                                    <td><?= $client['state'] ?></td>
                                                    <td><?= $client['phone'] ?></td>
                                                    <td><?= $client['email'] ?></td>
                                                    <td><?= $client['active'] ? "SIM" : "NÃO" ?></td>
                                                    <td>
                                                    <a href="<?= "edit.php?id=" . $client['id'] ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    </td>
                                                </tr>

                                            <?php
                                                endforeach; 
                                            ?>



                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./assets/js/demo/datatables-demo.js"></script>

</body>

</html>