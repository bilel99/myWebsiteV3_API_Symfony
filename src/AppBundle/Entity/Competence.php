<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 *
 * @ORM\Table(name="competence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompetenceRepository")
 */
class Competence
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
     * @var CompetenceGroup
     * @ORM\OneToOne(targetEntity="CompetenceGroup", inversedBy="competence")
     * @ORM\JoinColumn(name="competenceGroup_id", referencedColumnName="id")
     */
    private $competenceGroup;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="Cv", mappedBy="competence")
     */
    private $cv;

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
     * @ORM\Column(name="savoir", type="string", length=255)
     */
    private $savoir;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Competence
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
     * Set savoir
     *
     * @param string $savoir
     *
     * @return Competence
     */
    public function setSavoir($savoir)
    {
        $this->savoir = $savoir;

        return $this;
    }

    /**
     * Get savoir
     *
     * @return string
     */
    public function getSavoir()
    {
        return $this->savoir;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Competence
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Competence
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
        $this->cv = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set competenceGroup
     *
     * @param \AppBundle\Entity\CompetenceGroup $competenceGroup
     *
     * @return Competence
     */
    public function setCompetenceGroup(\AppBundle\Entity\CompetenceGroup $competenceGroup = null)
    {
        $this->competenceGroup = $competenceGroup;

        return $this;
    }

    /**
     * Get competenceGroup
     *
     * @return \AppBundle\Entity\CompetenceGroup
     */
    public function getCompetenceGroup()
    {
        return $this->competenceGroup;
    }

    /**
     * Add cv
     *
     * @param \AppBundle\Entity\Cv $cv
     *
     * @return Competence
     */
    public function addCv(\AppBundle\Entity\Cv $cv)
    {
        $this->cv[] = $cv;

        return $this;
    }

    /**
     * Remove cv
     *
     * @param \AppBundle\Entity\Cv $cv
     */
    public function removeCv(\AppBundle\Entity\Cv $cv)
    {
        $this->cv->removeElement($cv);
    }

    /**
     * Get cv
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCv()
    {
        return $this->cv;
    }
}
