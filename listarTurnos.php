<?php
include (__DIR__."/repository/CitaDao.php");
header("Content-Type:application/json");
$connection = new CitaDao();
if(!(isset($_SERVER['REQUEST_METHOD']) and $_SERVER['REQUEST_METHOD'] == 'GET')){
    return;
}
if(!($_GET['medicoId'] !== null)) {
    return;
}
$medico_id = $_GET['medicoId'];
echo json_encode($connection->getByMedicoId($medico_id));

