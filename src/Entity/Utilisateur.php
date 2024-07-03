<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatarFilename = null;

    #[ORM\Column(length: 50)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $Motdepasse = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateInscription = null;

    /**
     * @var Collection<int, Commentaire>
     */
    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $commentaires;

    /**
     * @var Collection<int, Vote>
     */
    #[ORM\OneToMany(targetEntity: Vote::class, mappedBy: 'Utilisateur')]
    private Collection $votes;

    /**
     * @var Collection<int, Deal>
     */
    #[ORM\OneToMany(targetEntity: Deal::class, mappedBy: 'utilisateur')]
    private Collection $deals;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->votes = new ArrayCollection();
        $this->deals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvatarFilename(): ?string
    {
        return $this->avatarFilename;
    }

    public function setAvatarFilename(?string $avatarFilename): static
    {
        $this->avatarFilename = $avatarFilename;

        return $this;
    }

    public function getInitials(): string
    {
        $names = explode(' ', $this->fullName);
        $initials = '';

        foreach ($names as $name) {
            $initials .= strtoupper($name[0]);
        }

        return $initials;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->Motdepasse;
    }

    public function setMotdepasse(string $Motdepasse): static
    {
        $this->Motdepasse = $Motdepasse;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->DateInscription;
    }

    public function setDateInscription(\DateTimeInterface $DateInscription): static
    {
        $this->DateInscription = $DateInscription;

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
            $commentaire->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUtilisateur() === $this) {
                $commentaire->setUtilisateur(null);
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
            $vote->setUtilisateur($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): static
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getUtilisateur() === $this) {
                $vote->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Deal>
     */
    public function getDeals(): Collection
    {
        return $this->deals;
    }

    public function addDeal(Deal $deal): static
    {
        if (!$this->deals->contains($deal)) {
            $this->deals->add($deal);
            $deal->setUtilisateur($this);
        }

        return $this;
    }

    public function removeDeal(Deal $deal): static
    {
        if ($this->deals->removeElement($deal)) {
            // set the owning side to null (unless already changed)
            if ($deal->getUtilisateur() === $this) {
                $deal->setUtilisateur(null);
            }
        }

        return $this;
    }

    // Implémentation des méthodes de UserInterface

    public function getRoles(): array
    {
        // Définissez ici les rôles de l'utilisateur.
        // Par exemple, ['ROLE_USER'] ou ['ROLE_ADMIN'].
        return ['ROLE_USER'];
    }

    public function eraseCredentials() : void
    {
        // Méthode appelée après l'authentification pour effacer les informations sensibles
        // qui pourraient avoir été stockées.
    }

    public function getUserIdentifier(): string
    {
        // Retourne l'identifiant unique de l'utilisateur.
        // Dans votre cas, cela pourrait être l'email ou un autre identifiant unique.
        return $this->email;
    }
}
