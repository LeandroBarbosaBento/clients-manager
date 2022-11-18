<?php
require_once "../vendor/autoload.php";

use Controller\Main;

echo "<h1>LOAD DATA</h1> <br> <br>";
echo "<pre>";

$xml = simplexml_load_file($_FILES["clients"]["tmp_name"]);

$controller = new Main();

$controller->loadDataFromXML($xml);


header("Location: ../index.php");

?>