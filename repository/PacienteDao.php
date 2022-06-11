<?php
include_once("connection.php");


class PacienteDao
{
    private $dbConnection = null;

    public function __construct()
    {
        $this->dbConnection = (new Connection())->getConnection();
    }

    public function getByCedula($cedula){
        $query = "SELECT * FROM Pacientes WHERE cedula = :cedula";
        $sql = $this->dbConnection->prepare($query);
        $sql->bindValue(":cedula",$cedula);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql->fetch();
    }

}