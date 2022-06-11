<?php

class Connection {

    private $dbConnection = null;

    public function __construct()
    {
        $host = 'localhost';
        $port = '3306';
        $db   = 'sysCitas';
        $user = 'root';
        $pass = '';

        try {
            $this->dbConnection = new PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }


}