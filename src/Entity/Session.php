<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
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
     * @ORM\ManyToMany(targetEntity=Formation::class, mappedBy="FormaSession")
     */
    private $formations;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="sessions")
     */
    private $SessUser;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, inversedBy="sessions")
     */
    private $SessFormation;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="session")
     */
    private $SessSeance;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="SeanceSession")
     */
    private $seances;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="UserSession")
     */
    private $user;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->SessUser = new ArrayCollection();
        $this->SessFormation = new ArrayCollection();
        $this->SessSeance = new ArrayCollection();
        $this->seances = new ArrayCollection();
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

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->addFormaSession($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            $formation->removeFormaSession($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getSessUser(): Collection
    {
        return $this->SessUser;
    }

    public function addSessUser(User $sessUser): self
    {
        if (!$this->SessUser->contains($sessUser)) {
            $this->SessUser[] = $sessUser;
        }

        return $this;
    }

    public function removeSessUser(User $sessUser): self
    {
        $this->SessUser->removeElement($sessUser);

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getSessFormation(): Collection
    {
        return $this->SessFormation;
    }

    public function addSessFormation(Formation $sessFormation): self
    {
        if (!$this->SessFormation->contains($sessFormation)) {
            $this->SessFormation[] = $sessFormation;
        }

        return $this;
    }

    public function removeSessFormation(Formation $sessFormation): self
    {
        $this->SessFormation->removeElement($sessFormation);

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSessSeance(): Collection
    {
        return $this->SessSeance;
    }

    public function addSessSeance(Seance $sessSeance): self
    {
        if (!$this->SessSeance->contains($sessSeance)) {
            $this->SessSeance[] = $sessSeance;
            $sessSeance->setSession($this);
        }

        return $this;
    }

    public function removeSessSeance(Seance $sessSeance): self
    {
        if ($this->SessSeance->removeElement($sessSeance)) {
            // set the owning side to null (unless already changed)
            if ($sessSeance->getSession() === $this) {
                $sessSeance->setSession(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setSeanceSession($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getSeanceSession() === $this) {
                $seance->setSeanceSession(null);
            }
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
}
