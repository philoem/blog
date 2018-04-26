<?php
namespace classe\App\Manager;

use \PDO;
/**
 * classe Pagination pour les billets de la page user_post.php, héritée de la classe DbConnect
 * 
 */

class Pagination extends DbConnect
{
    /**
     * Définit le nombre de billets dans la page user_post.php
     *
     * @var integer
     */
    public $billetsPage = 2;

    /**
     * Stocke la totalité des billets via une requête sql
     *
     * @var integer
     */
    public $billetsTotallyReq;

    /**
     * Stocke la totalité des billets 
     *
     * @var integer
     */
    public $billetsTotally;

    /**
     * stocke le nombre de pages totales
     *
     * @var integer
     */
    public $pagesTotales;

    /**
     * stocke le billet de départ, la lecture
     *
     * @var integer
     */
    public $start;

    /**
     * stocke le numéro de la page courante
     *
     * @var integer
     */
    public $currentPage;

    /**
     * stocke les billets qui ont été approuvés par l'auteur via une requête sql
     *
     * @var [string]
     */
    public $datas;
    
    

    /**
     * Pour récupérer la totalité des billets dans la base de données "book" qui ont été approuvés par l'auteur
     *
     * @return string $billetsTotallyReq 
     */
    public function getBillets()
    {
        $this->billetsTotallyReq = $this->getPDO()->query('SELECT id FROM book where approuved = 1');

        $this->billetsTotallyReq->execute();
        $this->billetsTotallyReq->fetch();
        
        return $this->billetsTotallyReq;

    } 

    /**
     * Calcul le nombre de pages totales en fonction du nombre de billets à afficher sur la page
     * 
     * En utilisant la fonction "ceil" pour avoir un entier et non un nombre décimal
     *
     * @return integer $pagesTotales 
     */
    public function numberPages(): int
    {
        $this->billetsTotally = $this->getBillets()->rowCount();

        $this->pagesTotales = ceil($this->billetsTotally / $this->billetsPage);

        return $this->pagesTotales;

    }

    /**
     * Undocumented function
     *
     * @return string $datas
     */
    public function readBillets()
    {
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $this->numberPages()) {
           
            $_GET['page'] = (int) $_GET['page'];
            $this->currentPage = $_GET['page'];
            
        } else {
            $this->currentPage = 1;
        }
        $this->start = ($this->currentPage-1) * $this->billetsPage;
        
        $this->datas = $this->getPDO()->prepare('SELECT * FROM book WHERE approuved = 1 ORDER BY id DESC LIMIT '.$this->start.','.$this->billetsPage);
        $this->datas->execute();
        
        return $this->datas;
    }    

    /**
     * Boucle d'itération pour afficher les numéros de pages des billets
     *
     * @return void 
     */
    public function displayNumbersPages()
    {
        
        for ($i = 1; $i <= $this->numberPages(); $i++) {
            
            if ($i == $this->currentPage) {
                
                echo $i.' ';

            } else {

                echo '<a href="../controlers/user_postControl.php?page='.$i.'">'.$i.'</a> ';

            }
        }
        
      
    }


}