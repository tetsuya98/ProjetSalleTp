<?php 
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SalleController extends AbstractController{
    public function accueil() {
        $nombre = rand(1, 84);
        return $this->render('salle/accueil.html.twig', array('numero' => $nombre));
    }

    public function afficher($numero) {
        return $this->render('salle/afficher.html.twig', array('numero' => $numero));
    }

    public function dix() {
        $url = $this->generateUrl('salle_tp_afficher', array('numero' => 10));
        return $this->redirect($url);
        //ou
        //return $this->redirectToRoute('salle_tp_afficher', array('numero' => 10));
    }

    public function testXml(Request $request) {
        $remoteAddr = $request->server->get('REMOTE_ADDR');
        $rep = new Response;
        $rep->setContent('<?xml version="1.0" encoding="UTF-8"?><remoteAddr>'
            .$remoteAddr.'</remoteAddr>');
        $rep->headers->set('Content-Type', 'text/xml');
        return $rep;
    }
    public function testJson(Request $request) {
        $remoteAddr = $request->server->get('REMOTE_ADDR');
        $data = array('remoteAddr' => $remoteAddr);
        return new JsonResponse($data);
    }
}

