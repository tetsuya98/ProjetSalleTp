<?php 
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;

class SalleController {
    public function accueil() {
        return new Response("ici l'accueil !");
    }
}