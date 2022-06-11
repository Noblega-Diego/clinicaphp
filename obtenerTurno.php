<?php
include (__DIR__."/repository/CitaDao.php");
include (__DIR__."/repository/PacienteDao.php");
include (__DIR__."/models/Cita.php");

header("Content-Type:application/json");
$citaDao = new CitaDao();

if(!(isset($_SERVER['REQUEST_METHOD']) and $_SERVER['REQUEST_METHOD'] == 'GET')){
    return;
}
if(!($_GET['MedId'] !== null)) {
    return;
}
if(!($_GET['PacienteId'] !== null)) {
    return;
}

$medico_id = $_GET['MedId'];
$paciente_id = $_GET['PacienteId'];
$list = $citaDao->getByMedicoId($medico_id);
$fechaUltimoTurno = date($list[0]["fecha"]);
$nuevaFecha = strtotime($fechaUltimoTurno);
$nuevaFecha = strtotime("+1 hour", $nuevaFecha);

$nuevaFecha = date( 'Y-m-d H:i:s' , $nuevaFecha);
$cita = new Cita();

$cita->setFecha($nuevaFecha);
$cita->setEstado(0);
$cita->setMedicoId($medico_id);
$cita->setPacienteId($paciente_id);
$nuevaCita = $citaDao->create($cita);
echo json_encode($nuevaCita);

