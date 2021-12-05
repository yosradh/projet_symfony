<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
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
    private $date_recla;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contenu_recla;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="UserOneReclamation")
     */
    private $manyUser;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reclamations")
     */
    private $manyReclamationUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRecla(): ?\DateTimeInterface
    {
        return $this->date_recla;
    }

    public function setDateRecla(\DateTimeInterface $date_recla): self
    {
        $this->date_recla = $date_recla;

        return $this;
    }

    public function getContenuRecla(): ?string
    {
        return $this->Contenu_recla;
    }

    public function setContenuRecla(string $Contenu_recla): self
    {
        $this->Contenu_recla = $Contenu_recla;

        return $this;
    }

    public function getManyUser(): ?User
    {
        return $this->manyUser;
    }

    public function setManyUser(?User $manyUser): self
    {
        $this->manyUser = $manyUser;

        return $this;
    }

    public function getManyReclamationUser(): ?User
    {
        return $this->manyReclamationUser;
    }

    public function setManyReclamationUser(?User $manyReclamationUser): self
    {
        $this->manyReclamationUser = $manyReclamationUser;

        return $this;
    }


}
