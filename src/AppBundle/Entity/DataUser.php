<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DataUser
 *
 * @ORM\Table(name="data_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DataUserRepository")
 */
class DataUser
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
     * @ORM\Column(name="idUser", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="biographie", type="string", length=5000, nullable=true)
     */
    private $biographie;

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
     * @var string
     *
     * @ORM\Column(name="profilGithub", type="string", length=255, nullable=true)
     */
    private $profilGithub;

    /**
     * @var string
     *
     * @ORM\Column(name="profilDoYouBuzz", type="string", length=255, nullable=true)
     */
    private $profilDoYouBuzz;


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
     * @return DataUser
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
     * @return DataUser
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
     * Set biographie
     *
     * @param string $biographie
     *
     * @return DataUser
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * Get biographie
     *
     * @return string
     */
    public function getBiographie()
    {
        return $this->biographie;
    }

    /**
     * Set profilTwitter
     *
     * @param string $profilTwitter
     *
     * @return DataUser
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
     * @return DataUser
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

    /**
     * Set profilGithub
     *
     * @param string $profilGithub
     *
     * @return DataUser
     */
    public function setProfilGithub($profilGithub)
    {
        $this->profilGithub = $profilGithub;

        return $this;
    }

    /**
     * Get profilGithub
     *
     * @return string
     */
    public function getProfilGithub()
    {
        return $this->profilGithub;
    }

    /**
     * Set profilDoYouBuzz
     *
     * @param string $profilDoYouBuzz
     *
     * @return DataUser
     */
    public function setProfilDoYouBuzz($profilDoYouBuzz)
    {
        $this->profilDoYouBuzz = $profilDoYouBuzz;

        return $this;
    }

    /**
     * Get profilDoYouBuzz
     *
     * @return string
     */
    public function getProfilDoYouBuzz()
    {
        return $this->profilDoYouBuzz;
    }
}

