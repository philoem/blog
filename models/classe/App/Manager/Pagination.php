<?php
namespace classe\App\Manager;

use \PDO;
/**
 * classe Pagination héritée de la classe DbConnect
 * 
 */

class Pagination extends DbConnect
{
	public $billetsPage = 1;

	public $billetsTotallyReq;

	public $billetsTotally;

    public $pagesTotales;

    public $start;

    public $currentPage;

    public $datas;
    
    

    public function getBillets()
    {
        $this->billetsTotallyReq = $this->getPDO()->query('SELECT id FROM book where approuved = 1');

        $this->billetsTotallyReq->execute();
        $this->billetsTotallyReq->fetch();
        
        return $this->billetsTotallyReq;

    } 

    public function numberPages(): int
    {
        $this->billetsTotally = $this->getBillets()->rowCount();

        $this->pagesTotales = ceil($this->billetsTotally / $this->billetsPage);

        return $this->pagesTotales;

    }

    public function readBillets()
    {
        if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $this->numberPages()) {
           
            $_GET['page'] = (int) $_GET['page'];
            $this->currentPage = $_GET['page'];
            
        } else {
            $this->currentPage = 1;
        }
        $this->start = ($this->currentPage-1) * $this->billetsPage;
        
        $this->datas = $this->getPDO()->query('SELECT * FROM book WHERE approuved = 1 ORDER BY id DESC LIMIT '.$this->start.','.$this->billetsPage);
        
        return $this->datas;
    }    

    public function displayNumbersPages($i)
    {
        for ($i=1; $i <= $this->numberPages(); $i++) {
            
            if ($i == $this->currentPage) {
                
                echo $i.' ';

            } else {

                echo '<a href="/controlers/user_postControl.php?page="'.$i.'">'.$i.'</a> ';

            }
        }
        
      
    }


}