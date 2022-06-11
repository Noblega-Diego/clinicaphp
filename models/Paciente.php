<?php

class Paciente
{
    private $id = 0;
    private $nombre = "";
    private $apellido = "";
    private $cedula = 0;

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

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return int
     */
    public function getCedula(): int
    {
        return $this->cedula;
    }

    /**
     * @param int $cedula
     */
    public function setCedula(int $cedula): void
    {
        $this->cedula = $cedula;
    }


}