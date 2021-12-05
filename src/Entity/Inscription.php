<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
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
    private $Date_formation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_condidat;
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="inscriptions")
     */
    private $InscritUser;


    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="FormaInscrit")
     */
    private $formation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFormation(): ?\DateTimeInterface
    {
        return $this->Date_formation;
    }

    public function setDateFormation(\DateTimeInterface $Date_formation): self
    {
        $this->Date_formation = $Date_formation;

        return $this;
    }

    public function getNombreCondidat(): ?int
    {
        return $this->nombre_condidat;
    }

    public function setNombreCondidat(int $nombre_condidat): self
    {
        $this->nombre_condidat = $nombre_condidat;

        return $this;
    }

    public function getInscritUser(): ?User
    {
        return $this->InscritUser;
    }

    public function setInscritUser(?User $InscritUser): self
    {
        $this->InscritUser = $InscritUser;

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


}
