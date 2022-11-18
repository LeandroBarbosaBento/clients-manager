<?php

require_once "vendor/autoload.php";

use Controller\Main;

$id = $_GET['id'];

$controller = new Main();

$client = $controller->getDataFromClient($id);

//print_r($client);

//die();
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
                        <h1 class="h3 mb-0 text-gray-800">Editar cliente</h1>

                        <a href="index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Editar cliente</h6>
                                </div>
                                <div class="card-body">

                                    <!-- <form  action="actions/load-data.php" method="post" enctype="multipart/form-data"> -->
                                    <form method="post" action="actions/edit-client.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <input 
                                                    required 
                                                    type="hidden" 
                                                    class="form-control" 
                                                    name="id"
                                                    value="<?= $client['id'] ?>"
                                                >
                                                <label class="form-label">Nome: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="name"
                                                    value="<?= $client['name'] ?>"
                                                >
                                            </div>
                                            <div class="mb-3 col">
                                                <label class="form-label">Documento: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="document"
                                                    value="<?= $client['document'] ?>"
                                                >
                                            </div>
                                            <div class="mb-3 col">
                                                <label class="form-label">CEP: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="zipcode"
                                                    value="<?= $client['zipcode'] ?>"
                                                >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-6">
                                                <label class="form-label">Endereço: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="address"
                                                    value="<?= $client['address'] ?>"
                                                >
                                            </div>
                                            <div class="mb-3 col-2">
                                                <label class="form-label">Bairro: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="district"
                                                    value="<?= $client['district'] ?>"
                                                >
                                            </div>
                                            <div class="mb-3 col-2">
                                                <label class="form-label">Cidade: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="city"
                                                    value="<?= $client['city'] ?>"
                                                >
                                            </div>
                                            <div class="mb-3 col-2">
                                                <label class="form-label">UF: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="state"
                                                    value="<?= $client['state'] ?>"
                                                >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label class="form-label">Email: </label>
                                                <input 
                                                    required 
                                                    type="email" 
                                                    class="form-control" 
                                                    name="email"
                                                    value="<?= $client['email'] ?>"
                                                >
                                            </div>
                                            <div class="mb-3 col">
                                                <label class="form-label">Telefone: </label>
                                                <input 
                                                    required 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="phone"
                                                    value="<?= $client['phone'] ?>"
                                                >
                                            </div>

                                            <div class="mb-3 col">
                                                <label class="form-label">Ativo: </label>
                                                <select 
                                                    class="form-control" 
                                                    required 
                                                    name="active"
                                                >
                                                    <option value="1" <?= $client['active'] == 1 ? "selected" : "" ?> >Sim</option>
                                                    <option value="0" <?= $client['active'] == 0 ? "selected" : "" ?>>Não</option>
                                                </select>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Salvar</button>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>


</body>

</html>