<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cv
 *
 * @ORM\Table(name="cv")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CvRepository")
 */
class Cv
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
     * @ORM\ManyToMany(targetEntity="Media", inversedBy="cv", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id", nullable=true)
     */
    private $media;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="User", inversedBy="cv")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Langue
     * @ORM\OneToOne(targetEntity="Langue", inversedBy="cv")
     * @ORM\JoinColumn(name="langue_id", referencedColumnName="id")
     */
    private $langue;

    /**
     * @var Formation
     * @ORM\ManyToMany(targetEntity="Formation", inversedBy="cv")
     * @ORM\JoinColumn(name="formation_id", referencedColumnName="id")
     */
    private $formation;

    /**
     * @var Experience
     * @ORM\ManyToMany(targetEntity="Experience", inversedBy="cv")
     * @ORM\JoinColumn(name="experience_id", referencedColumnName="id")
     */
    private $experience;

    /**
     * @var Competence
     * @ORM\ManyToMany(targetEntity="Competence", inversedBy="cv")
     * @ORM\JoinColumn(name="competence_id", referencedColumnName="id")
     */
    private $competence;

    /**
     * @var CompetenceLangue
     * @ORM\ManyToMany(targetEntity="CompetenceLangue", inversedBy="cv")
     * @ORM\JoinColumn(name="competenceLangue_id", referencedColumnName="id")
     */
    private $competenceLangue;

    /**
     * @var Loisir
     * @ORM\ManyToMany(targetEntity="Loisir", inversedBy="cv")
     * @ORM\JoinColumn(name="loisir_id", referencedColumnName="id")
     */
    private $loisir;


    // FIN RELATION SHIP

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="situation", type="string", length=255)
     */
    private $situation;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="permis", type="string", length=255)
     */
    private $permis;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="about", type="text")
     */
    private $about;

    /**
     * @var int
     *
     * @ORM\Column(name="mobile", type="integer")
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;


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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Cv
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Cv
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set situation
     *
     * @param string $situation
     *
     * @return Cv
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Get situation
     *
     * @return string
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     *
     * @return Cv
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set permis
     *
     * @param string $permis
     *
     * @return Cv
     */
    public function setPermis($permis)
    {
        $this->permis = $permis;

        return $this;
    }

    /**
     * Get permis
     *
     * @return string
     */
    public function getPermis()
    {
        return $this->permis;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Cv
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cv
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set about
     *
     * @param string $about
     *
     * @return Cv
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     *
     * @return Cv
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
     * Set email
     *
     * @param string $email
     *
     * @return Cv
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Cv
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
     * Constructor
     */
    public function __construct()
    {
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experience = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competence = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competenceLangue = new \Doctrine\Common\Collections\ArrayCollection();
        $this->loisir = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add medium
     *
     * @param \AppBundle\Entity\Media $medium
     *
     * @return Cv
     */
    public function addMedia(\AppBundle\Entity\Media $medium)
    {
        $this->media[] = $medium;

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \AppBundle\Entity\Media $medium
     */
    public function removeMedia(\AppBundle\Entity\Media $medium)
    {
        $this->media->removeElement($medium);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Cv
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set langue
     *
     * @param \AppBundle\Entity\Langue $langue
     *
     * @return Cv
     */
    public function setLangue(\AppBundle\Entity\Langue $langue = null)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return \AppBundle\Entity\Langue
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Add formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return Cv
     */
    public function addFormation(\AppBundle\Entity\Formation $formation)
    {
        $this->formation[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \AppBundle\Entity\Formation $formation
     */
    public function removeFormation(\AppBundle\Entity\Formation $formation)
    {
        $this->formation->removeElement($formation);
    }

    /**
     * Get formation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Add experience
     *
     * @param \AppBundle\Entity\Experience $experience
     *
     * @return Cv
     */
    public function addExperience(\AppBundle\Entity\Experience $experience)
    {
        $this->experience[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \AppBundle\Entity\Experience $experience
     */
    public function removeExperience(\AppBundle\Entity\Experience $experience)
    {
        $this->experience->removeElement($experience);
    }

    /**
     * Get experience
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Add competence
     *
     * @param \AppBundle\Entity\Competence $competence
     *
     * @return Cv
     */
    public function addCompetence(\AppBundle\Entity\Competence $competence)
    {
        $this->competence[] = $competence;

        return $this;
    }

    /**
     * Remove competence
     *
     * @param \AppBundle\Entity\Competence $competence
     */
    public function removeCompetence(\AppBundle\Entity\Competence $competence)
    {
        $this->competence->removeElement($competence);
    }

    /**
     * Get competence
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Add competenceLangue
     *
     * @param \AppBundle\Entity\CompetenceLangue $competenceLangue
     *
     * @return Cv
     */
    public function addCompetenceLangue(\AppBundle\Entity\CompetenceLangue $competenceLangue)
    {
        $this->competenceLangue[] = $competenceLangue;

        return $this;
    }

    /**
     * Remove competenceLangue
     *
     * @param \AppBundle\Entity\CompetenceLangue $competenceLangue
     */
    public function removeCompetenceLangue(\AppBundle\Entity\CompetenceLangue $competenceLangue)
    {
        $this->competenceLangue->removeElement($competenceLangue);
    }

    /**
     * Get competenceLangue
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetenceLangue()
    {
        return $this->competenceLangue;
    }

    /**
     * Add loisir
     *
     * @param \AppBundle\Entity\Loisir $loisir
     *
     * @return Cv
     */
    public function addLoisir(\AppBundle\Entity\Loisir $loisir)
    {
        $this->loisir[] = $loisir;

        return $this;
    }

    /**
     * Remove loisir
     *
     * @param \AppBundle\Entity\Loisir $loisir
     */
    public function removeLoisir(\AppBundle\Entity\Loisir $loisir)
    {
        $this->loisir->removeElement($loisir);
    }

    /**
     * Get loisir
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLoisir()
    {
        return $this->loisir;
    }
}
