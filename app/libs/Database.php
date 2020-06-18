<?php

class Database
{
    private $host = HOST;
    private $user = USER;
    private $password = PASSWORD;
    private $db = DATABASE;

    private $dbh;
    private $result;

    public function __construct()
    {
        $dns = "mysql:host=" . $this->host . ".dbname=" . $this->db;
        $options = [PDO::ATTR_ERRMODE => true,
                    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
        try {
            $this->dbh = new PDO($dns, $this->user, $this->password, $options);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            echo 'error de conexion' . $e->getMessage();
        }
    }

    public function query($sql)
    {
        $this->result = $this->dbh->prepare($sql);
    }

    public function bind($params, $value, $type = null)
    {
        if(is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        return $this->result->bindValue($params, $value, $type);
    }

    public function execute()
    {
        return $this->result->execute();
    }

    public function register()
    {
        $this->execute();
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

    public function registers()
    {
        $this->execute();
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->result->rowCount();
    }
}