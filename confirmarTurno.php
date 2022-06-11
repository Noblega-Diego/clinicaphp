<?php
include (__DIR__."/repository/CitaDao.php");
include (__DIR__."/models/Cita.php");

header("Content-Type:application/json");
$citaDao = new CitaDao();

if(!(isset($_SERVER['REQUEST_METHOD']) and $_SERVER['REQUEST_METHOD'] == 'GET')){
    return;
}
if(!($_GET['turnoId'] !== null)) {
    return;
}
if(!($_GET['confirmacion'] !== null)) {
    return;
}
$medico_id = $_GET['turnoId'];
$confirmacion = $_GET['confirmacion'];
$cita = $citaDao->getById($medico_id);//obtenemos la cita

$citaModificada = new Cita();
$citaModificada->setId($cita["id"]);
$citaModificada->setFecha($cita["fecha"]);
//le cambiamos el estado
$citaModificada->setEstado(($confirmacion == "Y")? 1:3);//1:estado de confirmacion, 3:estado de rechazo
$citaModificada->setMedicoId(intval($cita["medico_id"]));
$citaModificada->setPacienteId(intval($cita["paciente_id"]));
$nuevaCita = $citaDao->update($citaModificada);
echo json_encode($nuevaCita);

