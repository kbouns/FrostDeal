<?php

namespace App\Entity;

use App\Repository\DealRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DealRepository::class)]
class Deal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixInitial = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixReduit = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DatePublication = null;

    #[ORM\Column(length: 255)]
    private ?string $Lien = null;

    #[ORM\Column(length: 255)]
    private ?string $ImageFilename = null;

    /**
     * @var Collection<int, Commentaire>
     */
    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'deal', orphanRemoval: true)]
    private Collection $commentaires;

    /**
     * @var Collection<int, Vote>
     */
    #[ORM\OneToMany(targetEntity: Vote::class, mappedBy: 'Deal')]
    private Collection $votes;

    #[ORM\ManyToOne(inversedBy: 'deals')]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class)]
    private Collection $categories;

    #[ORM\Column(length: 255)]
    private ?string $livraison = null;

    public function __construct()
    {
        $this->idCategorie = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->votes = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrixInitial(): ?string
    {
        return $this->prixInitial;
    }

    public function setPrixInitial(string $prixInitial): static
    {
        $this->prixInitial = $prixInitial;

        return $this;
    }

    public function getPrixReduit(): ?string
    {
        return $this->prixReduit;
    }

    public function setPrixReduit(string $prixReduit): static
    {
        $this->prixReduit = $prixReduit;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->DatePublication;
    }

    public function setDatePublication(\DateTimeInterface $DatePublication): static
    {
        $this->DatePublication = $DatePublication;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->Lien;
    }

    public function setLien(string $Lien): static
    {
        $this->Lien = $Lien;

        return $this;
    }

    public function getImageFilename(): ?string
    {
        return $this->ImageFilename;
    }

    public function setImageFilename(string $ImageFilename): static
    {
        $this->ImageFilename = $ImageFilename;

        return $this;
    }

    public function getVote(): ?Vote
    {
        return $this->vote;
    }

    public function setVote(?Vote $vote): static
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setDeal($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getDeal() === $this) {
                $commentaire->setDeal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vote>
     */
    public function getVotes(): Collection
    {
        return $this->votes;
    }

    public function addVote(Vote $vote): static
    {
        if (!$this->votes->contains($vote)) {
            $this->votes->add($vote);
            $vote->setDeal($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): static
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getDeal() === $this) {
                $vote->setDeal(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function getLivraison(): ?string
    {
        return $this->livraison;
    }

    public function setLivraison(string $livraison): static
    {
        $this->livraison = $livraison;

        return $this;
    }
}
