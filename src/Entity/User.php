<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="integer")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="manyUser")
     */
    private $UserOneReclamation;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="manyReclamationUser")
     */
    private $reclamations;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="user")
     */
    private $UserInscrit;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="InscritUser")
     */
    private $inscriptions;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, mappedBy="FormaUser")
     */
    private $formations;

    /**
     * @ORM\ManyToMany(targetEntity=Avertissemets::class, mappedBy="AvertUser")
     */
    private $avertissemets;

    /**
     * @ORM\ManyToMany(targetEntity=Documents::class, mappedBy="DocUser")
     */
    private $documents;

    /**
     * @ORM\ManyToMany(targetEntity=Session::class, mappedBy="SessUser")
     */
    private $sessions;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="SeanceUser")
     */
    private $seances;

    /**
     * @ORM\OneToMany(targetEntity=Avertissemets::class, mappedBy="user")
     */
    private $UserAvertissement;

    /**
     * @ORM\ManyToMany(targetEntity=Documents::class, inversedBy="users")
     */
    private $UserDocuments;

    /**
     * @ORM\OneToMany(targetEntity=Session::class, mappedBy="user")
     */
    private $UserSession;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="user")
     */
    private $UserSeance;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="user")
     */
    private $userForma;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="FormationUser")
     */
    private $ListeFormations;

    public function __construct()
    {
        $this->UserOneReclamation = new ArrayCollection();
        $this->reclamations = new ArrayCollection();
        $this->UserInscrit = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->avertissemets = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->seances = new ArrayCollection();
        $this->UserAvertissement = new ArrayCollection();
        $this->UserDocuments = new ArrayCollection();
        $this->UserSession = new ArrayCollection();
        $this->UserSeance = new ArrayCollection();
        $this->userForma = new ArrayCollection();
        $this->ListeFormations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?int
    {
        return $this->password;
    }

    public function setPassword(int $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Reclamation[]
     */
    public function getUserOneReclamation(): Collection
    {
        return $this->UserOneReclamation;
    }

    public function addUserOneReclamation(Reclamation $userOneReclamation): self
    {
        if (!$this->UserOneReclamation->contains($userOneReclamation)) {
            $this->UserOneReclamation[] = $userOneReclamation;
            $userOneReclamation->setManyUser($this);
        }

        return $this;
    }

    public function removeUserOneReclamation(Reclamation $userOneReclamation): self
    {
        if ($this->UserOneReclamation->removeElement($userOneReclamation)) {
            // set the owning side to null (unless already changed)
            if ($userOneReclamation->getManyUser() === $this) {
                $userOneReclamation->setManyUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reclamation[]
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations[] = $reclamation;
            $reclamation->setManyReclamationUser($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getManyReclamationUser() === $this) {
                $reclamation->setManyReclamationUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getUserInscrit(): Collection
    {
        return $this->UserInscrit;
    }

    public function addUserInscrit(Inscription $userInscrit): self
    {
        if (!$this->UserInscrit->contains($userInscrit)) {
            $this->UserInscrit[] = $userInscrit;
            $userInscrit->setUser($this);
        }

        return $this;
    }

    public function removeUserInscrit(Inscription $userInscrit): self
    {
        if ($this->UserInscrit->removeElement($userInscrit)) {
            // set the owning side to null (unless already changed)
            if ($userInscrit->getUser() === $this) {
                $userInscrit->setUser(null);
            }
        }

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
            $inscription->setInscritUser($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getInscritUser() === $this) {
                $inscription->setInscritUser(null);
            }
        }

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
            $formation->addFormaUser($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            $formation->removeFormaUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Avertissemets[]
     */
    public function getAvertissemets(): Collection
    {
        return $this->avertissemets;
    }

    public function addAvertissemet(Avertissemets $avertissemet): self
    {
        if (!$this->avertissemets->contains($avertissemet)) {
            $this->avertissemets[] = $avertissemet;
            $avertissemet->addAvertUser($this);
        }

        return $this;
    }

    public function removeAvertissemet(Avertissemets $avertissemet): self
    {
        if ($this->avertissemets->removeElement($avertissemet)) {
            $avertissemet->removeAvertUser($this);
        }

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
            $document->addDocUser($this);
        }

        return $this;
    }

    public function removeDocument(Documents $document): self
    {
        if ($this->documents->removeElement($document)) {
            $document->removeDocUser($this);
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
            $session->addSessUser($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            $session->removeSessUser($this);
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
            $seance->setSeanceUser($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getSeanceUser() === $this) {
                $seance->setSeanceUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avertissemets[]
     */
    public function getUserAvertissement(): Collection
    {
        return $this->UserAvertissement;
    }

    public function addUserAvertissement(Avertissemets $userAvertissement): self
    {
        if (!$this->UserAvertissement->contains($userAvertissement)) {
            $this->UserAvertissement[] = $userAvertissement;
            $userAvertissement->setUser($this);
        }

        return $this;
    }

    public function removeUserAvertissement(Avertissemets $userAvertissement): self
    {
        if ($this->UserAvertissement->removeElement($userAvertissement)) {
            // set the owning side to null (unless already changed)
            if ($userAvertissement->getUser() === $this) {
                $userAvertissement->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Documents[]
     */
    public function getUserDocuments(): Collection
    {
        return $this->UserDocuments;
    }

    public function addUserDocument(Documents $userDocument): self
    {
        if (!$this->UserDocuments->contains($userDocument)) {
            $this->UserDocuments[] = $userDocument;
        }

        return $this;
    }

    public function removeUserDocument(Documents $userDocument): self
    {
        $this->UserDocuments->removeElement($userDocument);

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getUserSession(): Collection
    {
        return $this->UserSession;
    }

    public function addUserSession(Session $userSession): self
    {
        if (!$this->UserSession->contains($userSession)) {
            $this->UserSession[] = $userSession;
            $userSession->setUser($this);
        }

        return $this;
    }

    public function removeUserSession(Session $userSession): self
    {
        if ($this->UserSession->removeElement($userSession)) {
            // set the owning side to null (unless already changed)
            if ($userSession->getUser() === $this) {
                $userSession->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getUserSeance(): Collection
    {
        return $this->UserSeance;
    }

    public function addUserSeance(Seance $userSeance): self
    {
        if (!$this->UserSeance->contains($userSeance)) {
            $this->UserSeance[] = $userSeance;
            $userSeance->setUser($this);
        }

        return $this;
    }

    public function removeUserSeance(Seance $userSeance): self
    {
        if ($this->UserSeance->removeElement($userSeance)) {
            // set the owning side to null (unless already changed)
            if ($userSeance->getUser() === $this) {
                $userSeance->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getUserForma(): Collection
    {
        return $this->userForma;
    }

    public function addUserForma(Formation $userForma): self
    {
        if (!$this->userForma->contains($userForma)) {
            $this->userForma[] = $userForma;
            $userForma->setUser($this);
        }

        return $this;
    }

    public function removeUserForma(Formation $userForma): self
    {
        if ($this->userForma->removeElement($userForma)) {
            // set the owning side to null (unless already changed)
            if ($userForma->getUser() === $this) {
                $userForma->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getListeFormations(): Collection
    {
        return $this->ListeFormations;
    }

    public function addListeFormation(Formation $listeFormation): self
    {
        if (!$this->ListeFormations->contains($listeFormation)) {
            $this->ListeFormations[] = $listeFormation;
            $listeFormation->setFormationUser($this);
        }

        return $this;
    }

    public function removeListeFormation(Formation $listeFormation): self
    {
        if ($this->ListeFormations->removeElement($listeFormation)) {
            // set the owning side to null (unless already changed)
            if ($listeFormation->getFormationUser() === $this) {
                $listeFormation->setFormationUser(null);
            }
        }

        return $this;
    }
}
