<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ItemsController extends AbstractController
{
    #[Route('/catalog/items/{id}' , name: 'items' )]
public function helloAnnot ($id): Response
{
 $content = 'Liste des Articles : ' . $id;
 return new Response( $content );
}

}
