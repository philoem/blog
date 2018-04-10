<?php
namespace classe\App\Manager;
use \PDO;


class DbConnect {

    const HOST = 'localhost';
    const DBNAME = 'projet_4';
    const USERNAME = 'root';
    const PASSWORD = '';


    private function connect() {
        
        $db = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8,' .self::USERNAME.','.self::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       
		return $db;
    }
    
    public function getConnect() {
        return $this->connect();
    }
       
}