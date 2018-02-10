<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompetenceGroup
 *
 * @ORM\Table(name="competence_group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompetenceGroupRepository")
 */
class CompetenceGroup
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
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="competenceGroup")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="Competence", mappedBy="competenceGroup")
     */
    private $competence;

    // FIN RELATION SHIP

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


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
     * @return CompetenceGroup
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return CompetenceGroup
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
     * Set competence
     *
     * @param \AppBundle\Entity\Competence $competence
     *
     * @return CompetenceGroup
     */
    public function setCompetence(\AppBundle\Entity\Competence $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return \AppBundle\Entity\Competence
     */
    public function getCompetence()
    {
        return $this->competence;
    }
}
