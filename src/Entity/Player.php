<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
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
    * @ORM\Column(name="classement", type="string", length=20, nullable=false)
    */
   private $classement;

   /**
    * @var string
    *
    * @ORM\Column(name="club", type="string", length=20, nullable=false)
    */
   private $club;

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

   public function getClassement(): ?string
   {
       return $this->classement;
   }

   public function setClassement(string $classement): self
   {
       $this->classement = $classement;

       return $this;
   }

   public function getClub(): ?string
   {
       return $this->club;
   }

   public function setClub(string $club): self
   {
       $this->club = $club;

       return $this;
   }
}
