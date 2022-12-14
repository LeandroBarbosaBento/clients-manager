<?php
namespace Model;

class DB
{
    private $host = 'localhost';
    private $user = 'leandro';
    private $dbname = 'p21';
    private $password = '426351';
    public $conn;

    public function connect()
    {
        $this->conn = null;
  
        try{
            $this->conn = new \PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname, 
                $this->user, 
                $this->password
            );
            $this->conn->exec("set names utf8");
        }catch(\PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
