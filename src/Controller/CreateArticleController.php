<?php
namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateArticleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/catalog/list/create' , name: 'CreateArticle' )]
    public function createArticle()
    {
        $article = new Article();
        $article->setTitre('toto');
        $article->setContenu('toto');
        $article->setImage('https://picsum.photos/200');
        $article->setFav(4);
        $article->setHt(10);
        $article->setTva(20);
        $this->entityManager->persist($article);
        $this->entityManager->flush();
        return $this->render('create_article/index.html.twig', ['article' => $article]);
    }

    #[Route('/catalog/list/get/{id}' , name: 'GetArticle' )]
    public function GetArticle($id)
    {
        $repository = $this->entityManager->getRepository(Article::class);
        $article = $repository->findOneBy($id);
        return $this->render('create_article/index.html.twig', ['article' => $article]);
    }

    #[Route('/catalog/list/modified/{id}' , name: 'ModifiedArticle' )]
    public function ModifiedArticle($id)
    {
        $repository = $this->entityManager->getRepository(Article::class);
        $article = $repository->find($id);
        $article->setTitre('tata');
        $article->setContenu('tata');
        $this->entityManager->persist($article);
        $this->entityManager->flush();
        return $this->render('create_article/index.html.twig', ['article' => $article]);
    }

    #[Route('/catalog/list/delete/{id}' , name: 'DeleteArticle' )]
    public function deleteArticle($id)
    {
        $repository = $this->entityManager->getRepository(Article::class);
        $article = $repository->find($id);
        if ($article) {
            $this->entityManager->remove($article);
            $this->entityManager->flush();
            return $this->render('create_article/index.html.twig', ['article' => $article]);
    }}
}