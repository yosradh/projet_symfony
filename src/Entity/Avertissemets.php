<?php

namespace App\Entity;

use App\Repository\AvertissemetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvertissemetsRepository::class)
 */
class Avertissemets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="avertissemets")
     */
    private $AvertUser;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="UserAvertissement")
     */
    private $user;

    public function __construct()
    {
        $this->AvertUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getAvertUser(): Collection
    {
        return $this->AvertUser;
    }

    public function addAvertUser(User $avertUser): self
    {
        if (!$this->AvertUser->contains($avertUser)) {
            $this->AvertUser[] = $avertUser;
        }

        return $this;
    }

    public function removeAvertUser(User $avertUser): self
    {
        $this->AvertUser->removeElement($avertUser);

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
}
