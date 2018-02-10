<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MediaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // RELATIONS SHIP
    /**
     * @var array
     * @ORM\OneToOne(targetEntity="User", mappedBy="media")
     */
    private $user;

    /**
     * @var array
     * @ORM\OneToOne(targetEntity="InformationMe", mappedBy="media")
     */
    private $informationMe;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="Portfolio", mappedBy="media")
     */
    private $portfolio;

    /**
     * @var array
     * @ORM\ManyToMany(targetEntity="Cv", mappedBy="media")
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
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;
    // Work private variable
    private $file;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Media
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
     * Set filename
     *
     * @param string $filename
     *
     * @return Media
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Media
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
     * @return Media
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


    /*****************************************************
     *
     *                  Step Upload Image
     *
     ****************************************************/
    /**
     * @ORM\PostLoad()
     */
    public function postLoad(){
        $this->updatedAt = new \DateTime();
    }

    public function getUploadRootDir(){
        return __DIR__.'/../../../web/uploads';
    }

    public function getAbsolutePath(){
        return $this->filename === null ? null : $this->getUploadRootDir().'/'.$this->filename;
    }

    public function getAssetFilename(){
        return 'uploads/'.$this->filename;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload(){
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getFilename();
        $this->updatedAt = new \DateTime();

        if($this->file != null) {
            $this->filename = md5(uniqid()).'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload(){
        if($this->file !== null) {
            $this->file->move($this->getUploadRootDir(), $this->filename);
            unset($this->file);

            if($this->oldFile != null) {
                unlink($this->tempFile);
            }
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload(){
        $this->tempFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload(){
        if(file_exists($this->tempFile)){
            unlink($this->tempFile);
        }
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * FIN UPLOAD METHOD CALLBACK HASLIFE
     */


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->portfolio = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cv = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Media
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
     * Set informationMe
     *
     * @param \AppBundle\Entity\InformationMe $informationMe
     *
     * @return Media
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
     * Add portfolio
     *
     * @param \AppBundle\Entity\Portfolio $portfolio
     *
     * @return Media
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
     * Add cv
     *
     * @param \AppBundle\Entity\Cv $cv
     *
     * @return Media
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
