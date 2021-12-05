<?php

namespace App\Entity;

use App\Repository\DocumentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentsRepository::class)
 */
class Documents
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
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="FormaDocuments")
     */
    private $formation;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="documents")
     */
    private $DocUser;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, inversedBy="documents")
     */
    private $DocFormation;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="UserDocuments")
     */
    private $users;

    public function __construct()
    {
        $this->DocUser = new ArrayCollection();
        $this->DocFormation = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getDocUser(): Collection
    {
        return $this->DocUser;
    }

    public function addDocUser(User $docUser): self
    {
        if (!$this->DocUser->contains($docUser)) {
            $this->DocUser[] = $docUser;
        }

        return $this;
    }

    public function removeDocUser(User $docUser): self
    {
        $this->DocUser->removeElement($docUser);

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getDocFormation(): Collection
    {
        return $this->DocFormation;
    }

    public function addDocFormation(Formation $docFormation): self
    {
        if (!$this->DocFormation->contains($docFormation)) {
            $this->DocFormation[] = $docFormation;
        }

        return $this;
    }

    public function removeDocFormation(Formation $docFormation): self
    {
        $this->DocFormation->removeElement($docFormation);

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addUserDocument($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeUserDocument($this);
        }

        return $this;
    }
}
