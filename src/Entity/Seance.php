<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Session::class, inversedBy="SessSeance")
     */
    private $session;

    /**
     * @ORM\ManyToOne(targetEntity=Session::class, inversedBy="seances")
     */
    private $SeanceSession;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="seances")
     */
    private $SeanceUser;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="UserSeance")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getSeanceSession(): ?Session
    {
        return $this->SeanceSession;
    }

    public function setSeanceSession(?Session $SeanceSession): self
    {
        $this->SeanceSession = $SeanceSession;

        return $this;
    }

    public function getSeanceUser(): ?User
    {
        return $this->SeanceUser;
    }

    public function setSeanceUser(?User $SeanceUser): self
    {
        $this->SeanceUser = $SeanceUser;

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
