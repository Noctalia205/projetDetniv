<?php

namespace App\Controller;

use App\Service\CalculService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogController extends AbstractController
{
    public function __construct(private CalculService $calculService)
    {
    }
    #[Route('/catalog' , name: 'catalog' )]

    public function helloAnnot (): Response
    {
        $content = 'Liste des Articles : ';
        $articles = [
            [
                'titre' => 'T-shirt',
                'contenu' => 'haut blanc basique stradivarius S, comme neuf T-shirt cintré',
                'image' => 'https://picsum.photos/200',
                'fav' => 4,
                'prix' => 15,
                'tva' => 20,
            ],
            [
                'titre' => 'Veste kaki',
                'contenu' => 'Veste kaki légère manche longues zara Bon état',
                'image' => 'https://picsum.photos/300',
                'fav' => 2,
                'prix' => 10,
                'tva' => 20,
            ]
        ]; 
        foreach ($articles as &$article) {
            $article['prixTTC'] = $this->calculService->calculTTC($article['prix'], $article['tva']);
        }
        return $this->render('catalog/index.html.twig', ['content' => $content, 'articles' => $articles]);
    }
    
}
