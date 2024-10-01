<?php
namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity( repositoryClass: ArticleRepository:: class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue ]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column( length: 255)]
    private ?string $titre = null;

    #[ORM\Column( length: 255)]
    private ?string $contenu = null;

    #[ORM\Column( length: 255)]
    private ?string $image = null;

    #[ORM\Column( length: 255)]
    private ?int $fav = null;

    #[ORM\Column( length: 255)]
    private ?int $ht = null;

    #[ORM\Column( length: 255)]
    private ?int $tva = null;

    #[ORM\ManyToOne(targetEntity: Category::class, cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Category $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getFav(): ?int
    {
        return $this->fav;
    }

    public function setFav(?int $fav): self
    {
        $this->fav = $fav;
        return $this;
    }

    public function getHt(): ?int
    {
        return $this->ht;
    }

    public function setHt(?int $ht): self
    {
        $this->ht = $ht;
        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(?int $tva): self
    {
        $this->tva = $tva;
        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;
        return $this;
    }
}