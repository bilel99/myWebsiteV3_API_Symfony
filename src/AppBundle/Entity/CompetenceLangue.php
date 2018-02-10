<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompetenceLangue
 *
 * @ORM\Table(name="competence_langue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompetenceLangueRepository")
 */
class CompetenceLangue
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
     * @var array
     * @ORM\ManyToMany(targetEntity="Cv", mappedBy="competenceLangue")
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
     * @ORM\Column(name="langue", type="string", length=255)
     */
    private $langue;

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
     * @return CompetenceLangue
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
     * Set langue
     *
     * @param string $langue
     *
     * @return CompetenceLangue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return CompetenceLangue
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
     * @return CompetenceLangue
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
     * Add cv
     *
     * @param \AppBundle\Entity\Cv $cv
     *
     * @return CompetenceLangue
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
