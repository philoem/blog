
<?php

class Connect {
    private $_db_name;
    private $_db_user;
    private $_db_pass;
    private $_db_host;
    private $_pdo;
    
    
    public function __construct($db_name, $db_user = 'root', $db_pass ='', $db_host = 'localhost') {
        try 
        { 
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
            $this->db_host = $db_host;
        }
        catch (Exception $e)
        {
            die('Erreur :'.$e->getMessage());
        } 
    }
    private function getPDO() {
        $pdo = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;
    }
    public function query($statement) {
        $req = $this->getPDO()->query($statement);
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        return $data;
    
    }

}

