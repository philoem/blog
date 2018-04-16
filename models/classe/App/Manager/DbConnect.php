<?php
namespace classe\App\Manager;

use \PDO;
/**
 * class DbConnect parente
 * Connexion à la base de donnée via PDO 
 */

class DbConnect {

    protected $db_name;
    protected $db_user;
    protected $db_pass;
    protected $db_host;

    protected $pdo;



    public function __construct($db_name = 'projet_4', $db_user = 'root', $db_pass = '', $db_host ='localhost') {
        
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;

    }

    public function getPDO() {

        if ($this->pdo == null) {

            $pdo = new PDO('mysql:dbname=projet_4; host=localhost; charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        
        }
        
        return $this->pdo;

    }



}