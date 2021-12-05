<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="date")
     */
    private $validit;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="InsritFormation")
     */
    private $inscriptions;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="formation")
     */
    private $FormaInscrit;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="formations")
     */
    private $FormaUser;

    /**
     * @ORM\OneToMany(targetEntity=Documents::class, mappedBy="formation")
     */
    private $FormaDocuments;

    /**
     * @ORM\ManyToMany(targetEntity=Session::class, inversedBy="formations")
     */
    private $FormaSession;

    /**
     * @ORM\ManyToMany(targetEntity=Documents::class, mappedBy="DocFormation")
     */
    private $documents;

    /**
     * @ORM\ManyToMany(targetEntity=Session::class, mappedBy="SessFormation")
     */
    private $sessions;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userForma")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ListeFormations")
     */
    private $FormationUser;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->FormaInscrit = new ArrayCollection();
        $this->FormaUser = new ArrayCollection();
        $this->FormaDocuments = new ArrayCollection();
        $this->FormaSession = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getValidit(): ?\DateTimeInterface
    {
        return $this->validit;
    }

    public function setValidit(\DateTimeInterface $validit): self
    {
        $this->validit = $validit;

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setInsritFormation($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getInsritFormation() === $this) {
                $inscription->setInsritFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getFormaInscrit(): Collection
    {
        return $this->FormaInscrit;
    }

    public function addFormaInscrit(Inscription $formaInscrit): self
    {
        if (!$this->FormaInscrit->contains($formaInscrit)) {
            $this->FormaInscrit[] = $formaInscrit;
            $formaInscrit->setFormation($this);
        }

        return $this;
    }

    public function removeFormaInscrit(Inscription $formaInscrit): self
    {
        if ($this->FormaInscrit->removeElement($formaInscrit)) {
            // set the owning side to null (unless already changed)
            if ($formaInscrit->getFormation() === $this) {
                $formaInscrit->setFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFormaUser(): Collection
    {
        return $this->FormaUser;
    }

    public function addFormaUser(User $formaUser): self
    {
        if (!$this->FormaUser->contains($formaUser)) {
            $this->FormaUser[] = $formaUser;
        }

        return $this;
    }

    public function removeFormaUser(User $formaUser): self
    {
        $this->FormaUser->removeElement($formaUser);

        return $this;
    }

    /**
     * @return Collection|Documents[]
     */
    public function getFormaDocuments(): Collection
    {
        return $this->FormaDocuments;
    }

    public function addFormaDocument(Documents $formaDocument): self
    {
        if (!$this->FormaDocuments->contains($formaDocument)) {
            $this->FormaDocuments[] = $formaDocument;
            $formaDocument->setFormation($this);
        }

        return $this;
    }

    public function removeFormaDocument(Documents $formaDocument): self
    {
        if ($this->FormaDocuments->removeElement($formaDocument)) {
            // set the owning side to null (unless already changed)
            if ($formaDocument->getFormation() === $this) {
                $formaDocument->setFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getFormaSession(): Collection
    {
        return $this->FormaSession;
    }

    public function addFormaSession(Session $formaSession): self
    {
        if (!$this->FormaSession->contains($formaSession)) {
            $this->FormaSession[] = $formaSession;
        }

        return $this;
    }

    public function removeFormaSession(Session $formaSession): self
    {
        $this->FormaSession->removeElement($formaSession);

        return $this;
    }

    /**
     * @return Collection|Documents[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Documents $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->addDocFormation($this);
        }

        return $this;
    }

    public function removeDocument(Documents $document): self
    {
        if ($this->documents->removeElement($document)) {
            $document->removeDocFormation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->addSessFormation($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            $session->removeSessFormation($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getFormationUser(): ?User
    {
        return $this->FormationUser;
    }

    public function setFormationUser(?User $FormationUser): self
    {
        $this->FormationUser = $FormationUser;

        return $this;
    }
}
