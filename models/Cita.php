<?php

class Cita
{
    private $id = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    private $fecha = null;
    private $estado = 0;
    private $pacienteId;
    private $medicoId;

    /**
     * @return DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return int
     */
    public function getEstado(): int
    {
        return $this->estado;
    }

    /**
     * @param int $estado
     */
    public function setEstado(int $estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return int
     */
    public function getPacienteId()
    {
        return $this->pacienteId;
    }

    /**
     * @param int $pacienteId
     */
    public function setPacienteId($pacienteId): void
    {
        $this->pacienteId = $pacienteId;
    }

    /**
     * @return int
     */
    public function getMedicoId()
    {
        return $this->doctorId;
    }

    /**
     * @param int $doctorId
     */
    public function setMedicoId($doctorId): void
    {
        $this->doctorId = $doctorId;
    }



}