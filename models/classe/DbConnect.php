<?php
namespace Forteroche;
use \PDO;


class DbConnect {

    private $_db;

    private function connect() {
        if ($this->_db === null) {
            $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
		return $this->db;
    }
    public function getConnect() {
        return $this->connect();
    }
       
}

