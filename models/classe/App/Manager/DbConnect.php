<?php
namespace classe\App\Manager;

use \PDO;
include_once '../config.php';
/**
 * class DbConnect parente
 * Connexion à la base de donnée via PDO 
 */

class DbConnect {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;

    protected $pdo;



    public function __construct($db_name = DB_NAME, $db_user = DB_USER, $db_pass = DB_PASS, $db_host = DB_HOST) {
        
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;

    }

    public function getPDO() {

        if ($this->pdo == null) {

            $pdo = new PDO('mysql:dbname='.$this->db_name.'; host='.$this->db_host.'; charset=utf8', $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        
        }
        
        return $this->pdo;

    }



}