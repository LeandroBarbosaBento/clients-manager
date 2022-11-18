<?php
require_once "../vendor/autoload.php";

use Controller\Main;

$data = $_POST;
$id = $_POST['id'];


$controller = new Main();

$status = $controller->editClient($id, $data);

if($status){
    header("Location: ../index.php");
}
else {
    header("Location: ". $_SERVER['HTTP_REFERER']);
}



?>