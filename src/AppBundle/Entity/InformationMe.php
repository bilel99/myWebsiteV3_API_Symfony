<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InformationMe
 *
 * @ORM\Table(name="information_me")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InformationMeRepository")
 */
class InformationMe
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
     * @ORM\OneToOne(targetEntity="Media", inversedBy="informationMe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id", nullable=true)
     */
    private $media;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="User", inversedBy="informationMe")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Langue
     * @ORM\OneToOne(targetEntity="Langue", inversedBy="informationMe")
     * @ORM\JoinColumn(name="langue_id", referencedColumnName="id")
     */
    private $langue;

    // FIN RELATION SHIP

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
     * @ORM\Column(name="apropos", type="text")
     */
    private $apropos;

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
     * Set titre
     *
     * @param string $titre
     *
     * @return InformationMe
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
     * @return InformationMe
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
     * Set apropos
     *
     * @param string $apropos
     *
     * @return InformationMe
     */
    public function setApropos($apropos)
    {
        $this->apropos = $apropos;

        return $this;
    }

    /**
     * Get apropos
     *
     * @return string
     */
    public function getApropos()
    {
        return $this->apropos;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return InformationMe
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
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return InformationMe
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return InformationMe
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
     * @return InformationMe
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
}
