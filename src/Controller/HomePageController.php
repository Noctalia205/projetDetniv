<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/homePage' , name: 'homePage' )]
public function helloAnnot (): Response
{
 $content = 'Bonjour' ;
 return new Response( $content );
}

}
