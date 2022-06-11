<?php
include_once("connection.php");


class CitaDao
{
    private $dbConnection = null;

    public function __construct()
    {
        $this->dbConnection = (new Connection())->getConnection();
    }

    public function get_all(){
        $query = "SELECT * FROM Cita ORDER BY fecha DESC";
        $sql = $this->dbConnection->prepare($query);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql->fetchAll();
    }

    public function getByMedicoId($id){
        $query = "SELECT * FROM Cita WHERE medico_id = :id ORDER BY fecha DESC ";
        $sql = $this->dbConnection->prepare($query);
        $sql->bindValue(":id",$id);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql->fetchAll();
    }

    public function getById($id){
        $query = "SELECT * FROM Cita WHERE id = :id ";
        $sql = $this->dbConnection->prepare($query);
        $sql->bindValue(":id",$id);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql->fetch();
    }
    /**
     * @param Cita $cita
     */
    public function create(Cita $cita){
        $query = "INSERT INTO Cita(fecha, medico_id, paciente_id, estado) VALUES ( :fecha, :medicoId, :pacienteId, :estado )";
        $sql = $this->dbConnection->prepare($query);
        $sql->bindValue(":fecha",($cita->getFecha()));
        $sql->bindValue(":medicoId",$cita->getMedicoId());
        $sql->bindValue(":pacienteId",$cita->getPacienteId());
        $sql->bindValue(":estado",$cita->getEstado());
        $sql->execute();
        $lastIdQuery = "SELECT LAST_INSERT_ID() as lastinsert";
        $sqlb = $this->dbConnection->prepare($lastIdQuery);
        $sqlb->execute();
        $register = $sqlb->fetch();
        $id = $register["lastinsert"];
        return $this->getById($id);
    }
    /**
     * @param Cita $cita
     */
    public function update(Cita $cita){
        $query = "UPDATE Cita SET fecha = :fecha, medico_id = :medicoId, paciente_id = :pacienteId, estado = :estado  WHERE id = :id " ;
        $sql = $this->dbConnection->prepare($query);
        $sql->bindValue(":fecha",($cita->getFecha()));
        $sql->bindValue(":medicoId",$cita->getMedicoId(), PDO::PARAM_INT);
        $sql->bindValue(":pacienteId",$cita->getPacienteId(), PDO::PARAM_INT);
        $sql->bindValue(":estado",$cita->getEstado(), PDO::PARAM_INT);
        $sql->bindValue(":id",$cita->getId(), PDO::PARAM_INT);
        $sql->execute();
        return $this->getById((int)$cita->getId());
    }
}