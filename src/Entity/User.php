<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, \Serializable
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
     private $nom;

   /**
    * @var string
    *
    * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
    */
   private $prenom;

   /**
    * @var string
    *
    * @ORM\Column(name="login", type="string", length=20, nullable=false)
    */
   private $login;

   /**
    * @var string
    *
    * @ORM\Column(name="mdp", type="string", length=20, nullable=false)
    */
   private $mdp;

   /**
    * @var string
    *
    * @ORM\ManyToMany(targetEntity="App\Entity\Roles", inversedBy="user")
    */
   private $roles;

   public function __construct()
   {
     $this->salt = "";
       $this->roles = new ArrayCollection();
   }



    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection|Roles[]
     */
    public function getRole(): Collection
    {
        return $this->roles;
    }

    public function addRole(Roles $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    public function removeRole(Roles $role): self
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
        }

        return $this;
    }

    /**
    *  @see \Serializable::serialize()
    */
    public function serialize() {
      return serialize(
            array(
                $this->id, $this->login, $this->mdp,
                )
            );
    }
    public function unserialize($serialized)
    {
        list (
            $this->id, $this->login, $this->mdp,
        ) = unserialize($serialized);
    }

    public function getUsername(): ?string
    {
        return $this->login;
    }
    public function getSalt()
    {
      return null;
    }
    public function eraseCredentials()
    {

    }
    public function getPassword(): ?string
    {
        return $this->mdp;
    }

    public function getRoles()
    {
      $rolesl = [];

     foreach ($this->roles as $roles) {
         $rolesl[] = $roles->getNom();
     }

     return $rolesl;
    }

}
