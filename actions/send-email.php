<?php
require_once "../vendor/autoload.php";

use Controller\Main;

$content = $_POST['email-text'];
$subject = $_POST['subject'];

$controller = new Main();
$clients = $controller->getActiveClients();

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
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Email enviado!</h1>

                        <a href="../index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fa fa-back"></i> Voltar para lista de clientes
                        </a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg mb-4">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Email enviado aos clientes abaixo</h6>
                                </div>
                                <div class="card-body">

                                    <form>

                                    <?php
                                        foreach($clients as $client): 
                                    ?>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Enviado para:</label>
                                            <div class="col-sm-10">
                                            <input 
                                                type="text" 
                                                readonly 
                                                class="form-control-plaintext"
                                                value="<?= $client['email'] ?>"
                                            >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Assunto:</label>
                                            <div class="col-sm-10">
                                            <input 
                                                type="text" 
                                                readonly 
                                                class="form-control-plaintext"
                                                value="<?= $subject ?>"
                                            >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Texto:</label>
                                            <div class="col-sm-10">
                                            <textarea 
                                                class="form-control-plaintext"
                                                name="email-text"
                                                rows="3"
                                                readonly
                                                ><?= $content ?></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php
                                        endforeach; 
                                    ?>
                                    </form>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>


</body>

</html>