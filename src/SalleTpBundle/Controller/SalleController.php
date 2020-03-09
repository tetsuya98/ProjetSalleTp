<?php

namespace SalleTpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SalleTpBundle\Entity\Salle;

class SalleController extends Controller{
	public function accueilAction(){
		$nombre = rand(1,84);
		return $this->render('@SalleTp/Salle/accueil.html.twig',array( 'numero' => $nombre ));
	}

	public function voirAction($numero) {
		if($numero > 50)
			throw $this->createNotFoundException('C\'est trop !');
		else
			return $this->render('@SalleTp/Salle/voir.html.twig', array( 'numero' => $numero ));
	}
	
	public function dixAction(){
		return $this->redirectToRoute('salle_tp_voir',array('numero' => 10));
	}
	
	public function treizeAction(){
		$salle=new Salle;
		$salle->setBatiment('D');
		$salle->setEtage(1);
		$salle->setNumero(13);
		return $this->render('@SalleTp/Salle/treize.html.twig',array('salle' => $salle));
	}
	
	public function treize_bisAction(){
		$salle=new Salle;
		$salle->setBatiment('D');
		$salle->setEtage(1);
		$salle->setNumero(13);
		return $this->render('@SalleTp/Salle/treizebis.html.twig',array('designation' => $salle->__toString()));
	}
	
	public function voir2Action($id)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('SalleTpBundle:Salle');
		$salle = $repository->find($id);
		if($salle == null)
			throw $this->createNotFoundException('Salle[id='.$id.'] inexistante');
		return $this->render('@SalleTp/Salle/voir2.html.twig',array('salle' => $salle));
	}
	
	public function ajouterAction($batiment, $etage, $numero)
	{
		$entityManager = $this-> getDoctrine()->getManager();
		$salle = new Salle;
		$salle->setBatiment($batiment);
		$salle->setEtage($etage);
		$salle->setNumero($numero);
		$entityManager->persist($salle);
		$entityManager->flush();
		return $this->redirectToRoute('salle_tp_voir2',array('id' => $salle->getId()));
	}
} 
?>
