<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table(name="langue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LangueRepository")
 */
class Langue
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
     * @ORM\OneToOne(targetEntity="Portfolio", mappedBy="langue")
     */
    private $portfolio;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="InformationMe", mappedBy="langue")
     */
    private $informationMe;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="Cv", mappedBy="langue")
     */
    private $cv;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="CulteWord", mappedBy="langue")
     */
    private $culteWord;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="Cgu", mappedBy="langue")
     */
    private $cgu;

    // FIN RELATION SHIP

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=45)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
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
     * Set code
     *
     * @param string $code
     *
     * @return Langue
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Langue
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
     * @return Langue
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Set portfolio
     *
     * @param \AppBundle\Entity\Portfolio $portfolio
     *
     * @return Langue
     */
    public function setPortfolio(\AppBundle\Entity\Portfolio $portfolio = null)
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    /**
     * Get portfolio
     *
     * @return \AppBundle\Entity\Portfolio
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * Set informationMe
     *
     * @param \AppBundle\Entity\InformationMe $informationMe
     *
     * @return Langue
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
     * Set cv
     *
     * @param \AppBundle\Entity\Cv $cv
     *
     * @return Langue
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
     * Set culteWord
     *
     * @param \AppBundle\Entity\CulteWord $culteWord
     *
     * @return Langue
     */
    public function setCulteWord(\AppBundle\Entity\CulteWord $culteWord = null)
    {
        $this->culteWord = $culteWord;

        return $this;
    }

    /**
     * Get culteWord
     *
     * @return \AppBundle\Entity\CulteWord
     */
    public function getCulteWord()
    {
        return $this->culteWord;
    }

    /**
     * Set cgu
     *
     * @param \AppBundle\Entity\Cgu $cgu
     *
     * @return Langue
     */
    public function setCgu(\AppBundle\Entity\Cgu $cgu = null)
    {
        $this->cgu = $cgu;

        return $this;
    }

    /**
     * Get cgu
     *
     * @return \AppBundle\Entity\Cgu
     */
    public function getCgu()
    {
        return $this->cgu;
    }
}
