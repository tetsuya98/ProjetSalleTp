<?php

namespace Exo1Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class pageController extends Controller{
	public function accueilAction(){
		$nombre = rand(1,84);
		return $this->render('@Exo1/page/accueil2.html.twig');
	}
} 
?>
