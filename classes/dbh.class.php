<?php

class Dbh {
    private $hostName = 'localhost';
    private $userName = 'root';
    private $pwd = '';
    private $dbName = 'users';
    protected function connect(){
        try{
        $dsn = 'mysql:host=' . $this->hostName . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn,$this->userName,$this->pwd);
        $pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,pdo::FETCH_ASSOC);
        return $pdo;
        }catch (PDOException $a) {
            echo "ERROR :( " . $a->getMessage();
            die();
        }
    }
}