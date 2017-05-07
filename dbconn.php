<?php
namespace nanaksr;

use \PDO;
use \PDOException;
use \Exception;

class dbconn {
    public function __construct($settings = array()){
        $this->dblist = $settings;
    }
    
    public function pdo($name){
        try {
            $dbData = $this->dblist[$name];
            $dbVar = new PDO($dbData['dsn'], $dbData['user'], $dbData['pass']);
            $dbVar->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $dbVar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            throw new Exception('Error In Connection', 501);
        }
        return $dbVar;
    }
}


?>