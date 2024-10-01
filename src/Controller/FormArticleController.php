<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleCreationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormArticleController extends AbstractController
{
    #[Route('/creation', name: 'creation', methods: ['GET', 'POST'])]
    public function createArticle(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleCreationType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();
        }
        return $this->render('form_article/index.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }
}