<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loisir
 *
 * @ORM\Table(name="loisir")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LoisirRepository")
 */
class Loisir
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
     * @ORM\ManyToMany(targetEntity="Cv", mappedBy="loisir")
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
     * @ORM\Column(name="loisir", type="string", length=255)
     */
    private $loisir;

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
     * @return Loisir
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
     * Set loisir
     *
     * @param string $loisir
     *
     * @return Loisir
     */
    public function setLoisir($loisir)
    {
        $this->loisir = $loisir;

        return $this;
    }

    /**
     * Get loisir
     *
     * @return string
     */
    public function getLoisir()
    {
        return $this->loisir;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Loisir
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
     * @return Loisir
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
