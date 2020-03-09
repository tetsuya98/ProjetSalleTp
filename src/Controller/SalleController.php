<?php 
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalleController extends AbstractController{
    public function accueil() {
        $nombre = rand(1, 84);
        return $this->render('salle/accueil.html.twig', array('numero' => $nombre));
    }

    public function afficher($numero) {
        return $this->render('salle/afficher.html.twig', array('numero' => $numero));
    }
}

