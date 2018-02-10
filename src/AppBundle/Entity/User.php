<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // RELATION SHIP
    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="Media", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id", nullable=true)
     */
    private $media;

    /**
     * @var Ville
     * @ORM\OneToOne(targetEntity="Ville", inversedBy="user")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id", nullable=true)
     */
    private $ville;

    /**
     * @var Role
     * @ORM\OneToOne(targetEntity="Role", inversedBy="user")
     * @ORM\JoinColumn("role_id", referencedColumnName="id")
     */
    private $role;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="Portfolio", mappedBy="user")
     */
    private $portfolio;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="Cv", mappedBy="user")
     */
    private $cv;

    /**
     * @var array
     * @ORM\oneToMany(targetEntity="CompetenceGroup", mappedBy="user")
     */
    private $competenceGroup;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="InformationMe", mappedBy="user")
     */
    private $informationMe;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="CulteWord", mappedBy="user")
     */
    private $culteWord;


    // FIN RELATION SHIP

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
     * @ORM\Column(name="email", type="string", length=255, nullable=true, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var int
     *
     * @ORM\Column(name="mobile", type="integer")
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="forgot", type="string", length=255)
     */
    private $forgot;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * @return User
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
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return User
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     *
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return int
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set forgot
     *
     * @param string $forgot
     *
     * @return User
     */
    public function setForgot($forgot)
    {
        $this->forgot = $forgot;

        return $this;
    }

    /**
     * Get forgot
     *
     * @return string
     */
    public function getForgot()
    {
        return $this->forgot;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->portfolio = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competenceGroup = new \Doctrine\Common\Collections\ArrayCollection();
        $this->culteWord = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return User
     */
    public function setMedia(\AppBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \AppBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set villes
     *
     * @param \AppBundle\Entity\Villes $villes
     *
     * @return User
     */
    public function setVilles(\AppBundle\Entity\Villes $villes = null)
    {
        $this->villes = $villes;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set role
     *
     * @param \AppBundle\Entity\Role $role
     *
     * @return User
     */
    public function setRole(\AppBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \AppBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add portfolio
     *
     * @param \AppBundle\Entity\Portfolio $portfolio
     *
     * @return User
     */
    public function addPortfolio(\AppBundle\Entity\Portfolio $portfolio)
    {
        $this->portfolio[] = $portfolio;

        return $this;
    }

    /**
     * Remove portfolio
     *
     * @param \AppBundle\Entity\Portfolio $portfolio
     */
    public function removePortfolio(\AppBundle\Entity\Portfolio $portfolio)
    {
        $this->portfolio->removeElement($portfolio);
    }

    /**
     * Get portfolio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * Set cv
     *
     * @param \AppBundle\Entity\Cv $cv
     *
     * @return User
     */
    public function setCv(\AppBundle\Entity\Cv $cv = null)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return \AppBundle\Entity\Cv
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Add competenceGroup
     *
     * @param \AppBundle\Entity\CompetenceGroup $competenceGroup
     *
     * @return User
     */
    public function addCompetenceGroup(\AppBundle\Entity\CompetenceGroup $competenceGroup)
    {
        $this->competenceGroup[] = $competenceGroup;

        return $this;
    }

    /**
     * Remove competenceGroup
     *
     * @param \AppBundle\Entity\CompetenceGroup $competenceGroup
     */
    public function removeCompetenceGroup(\AppBundle\Entity\CompetenceGroup $competenceGroup)
    {
        $this->competenceGroup->removeElement($competenceGroup);
    }

    /**
     * Get competenceGroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetenceGroup()
    {
        return $this->competenceGroup;
    }

    /**
     * Set informationMe
     *
     * @param \AppBundle\Entity\InformationMe $informationMe
     *
     * @return User
     */
    public function setInformationMe(\AppBundle\Entity\InformationMe $informationMe = null)
    {
        $this->informationMe = $informationMe;

        return $this;
    }

    /**
     * Get informationMe
     *
     * @return \AppBundle\Entity\InformationMe
     */
    public function getInformationMe()
    {
        return $this->informationMe;
    }

    /**
     * Add culteWord
     *
     * @param \AppBundle\Entity\CulteWord $culteWord
     *
     * @return User
     */
    public function addCulteWord(\AppBundle\Entity\CulteWord $culteWord)
    {
        $this->culteWord[] = $culteWord;

        return $this;
    }

    /**
     * Remove culteWord
     *
     * @param \AppBundle\Entity\CulteWord $culteWord
     */
    public function removeCulteWord(\AppBundle\Entity\CulteWord $culteWord)
    {
        $this->culteWord->removeElement($culteWord);
    }

    /**
     * Get culteWord
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCulteWord()
    {
        return $this->culteWord;
    }

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\Ville $ville
     *
     * @return User
     */
    public function setVille(\AppBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }
}
