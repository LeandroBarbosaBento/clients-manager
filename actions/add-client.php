<?php
require_once "../vendor/autoload.php";

use Controller\Main;

$data = $_POST;

$controller = new Main();

$status = $controller->addClient($data);

header("Location: ../index.php");

?>