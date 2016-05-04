<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * dataUser
 *
 * @ORM\Table(name="data_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\dataUserRepository")
 */
class dataUser
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
     * @var int
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="profilGit", type="string", length=255, nullable=true)
     */
    private $profilGit;

    /**
     * @var string
     *
     * @ORM\Column(name="profilTwitter", type="string", length=255, nullable=true)
     */
    private $profilTwitter;

    /**
     * @var string
     *
     * @ORM\Column(name="profilLinkedIn", type="string", length=255, nullable=true)
     */
    private $profilLinkedIn;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return dataUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return dataUser
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return dataUser
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return dataUser
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set profilGit
     *
     * @param string $profilGit
     *
     * @return dataUser
     */
    public function setProfilGit($profilGit)
    {
        $this->profilGit = $profilGit;

        return $this;
    }

    /**
     * Get profilGit
     *
     * @return string
     */
    public function getProfilGit()
    {
        return $this->profilGit;
    }

    /**
     * Set profilTwitter
     *
     * @param string $profilTwitter
     *
     * @return dataUser
     */
    public function setProfilTwitter($profilTwitter)
    {
        $this->profilTwitter = $profilTwitter;

        return $this;
    }

    /**
     * Get profilTwitter
     *
     * @return string
     */
    public function getProfilTwitter()
    {
        return $this->profilTwitter;
    }

    /**
     * Set profilLinkedIn
     *
     * @param string $profilLinkedIn
     *
     * @return dataUser
     */
    public function setProfilLinkedIn($profilLinkedIn)
    {
        $this->profilLinkedIn = $profilLinkedIn;

        return $this;
    }

    /**
     * Get profilLinkedIn
     *
     * @return string
     */
    public function getProfilLinkedIn()
    {
        return $this->profilLinkedIn;
    }
}

