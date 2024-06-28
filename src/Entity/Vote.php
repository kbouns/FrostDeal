<?php

namespace App\Entity;

use App\Repository\VoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoteRepository::class)]
class Vote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $TypeVote = null;

    #[ORM\ManyToOne(inversedBy: 'votes')]
    private ?Deal $Deal = null;

    #[ORM\ManyToOne(inversedBy: 'votes')]
    private ?Utilisateur $Utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isTypeVote(): ?bool
    {
        return $this->TypeVote;
    }

    public function setTypeVote(bool $TypeVote): static
    {
        $this->TypeVote = $TypeVote;

        return $this;
    }

    /**
     * @return Collection<int, Deal>
     */
    public function getIdDeal(): Collection
    {
        return $this->idDeal;
    }

    public function addIdDeal(Deal $idDeal): static
    {
        if (!$this->idDeal->contains($idDeal)) {
            $this->idDeal->add($idDeal);
            $idDeal->setVote($this);
        }

        return $this;
    }

    public function removeIdDeal(Deal $idDeal): static
    {
        if ($this->idDeal->removeElement($idDeal)) {
            // set the owning side to null (unless already changed)
            if ($idDeal->getVote() === $this) {
                $idDeal->setVote(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->idUtilisateur;
    }

    public function addIdUtilisateur(Utilisateur $idUtilisateur): static
    {
        if (!$this->idUtilisateur->contains($idUtilisateur)) {
            $this->idUtilisateur->add($idUtilisateur);
            $idUtilisateur->setVote($this);
        }

        return $this;
    }

    public function removeIdUtilisateur(Utilisateur $idUtilisateur): static
    {
        if ($this->idUtilisateur->removeElement($idUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($idUtilisateur->getVote() === $this) {
                $idUtilisateur->setVote(null);
            }
        }

        return $this;
    }

    public function setIdUtilisateur(?Utilisateur $IdUtilisateur): static
    {
        $this->IdUtilisateur = $IdUtilisateur;

        return $this;
    }

    public function setIdDeal(?Deal $idDeal): static
    {
        $this->idDeal = $idDeal;

        return $this;
    }

    public function getDeal(): ?Deal
    {
        return $this->Deal;
    }

    public function setDeal(?Deal $Deal): static
    {
        $this->Deal = $Deal;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): static
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }
}
