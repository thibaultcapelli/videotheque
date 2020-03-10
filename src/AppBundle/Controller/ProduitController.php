<?php

namespace AppBundle\Controller;

use AppBundle\Produit\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProduitController extends Controller
{
    private function getProduits() {

        $produits = array();
        
        $produits[] = new Produit(1, "Table", 2, 100);
        
        $produits[] = new Produit(2, "Chaise", 14, 40);
        
        $produits[] = new Produit(3, "Table basse", 6, 85);
        
        return $produits;
        
    }

    private function getDate() {
        return date('d/m/Y');
    }
        
    /**
    
    * @Route("/produit", name="produit_index")
    
    */
        
    public function indexAction()
    {
    
        $produits = $this->getProduits();
        $date = $this->getDate();
        
        return $this->render(
            'produit/index.html.twig',
            array('listeProduits' => $produits, 'date' => $date)
        );
    
    }

}
