<?php

namespace Edu\EleraningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * post
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=50)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="public", type="boolean", nullable=true)
     */
    private $public;

    /**
     * @ORM\OneToMany(targetEntity="comment", mappedBy="post")
     */
    private $commentes;

    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="memo")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id", nullable=false)
     */
    private $useres;

    /**
     * @ORM\ManyToOne(targetEntity="lesson", inversedBy="post")
     * @ORM\JoinColumn(name="lessonid", referencedColumnName="id", nullable=false)
     */
    private $lessones;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return post
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return post
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return post
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return post
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return post
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commentes
     *
     * @param \Edu\EleraningBundle\Entity\comment $commentes
     * @return post
     */
    public function addCommente(\Edu\EleraningBundle\Entity\comment $commentes)
    {
        $this->commentes[] = $commentes;

        return $this;
    }

    /**
     * Remove commentes
     *
     * @param \Edu\EleraningBundle\Entity\comment $commentes
     */
    public function removeCommente(\Edu\EleraningBundle\Entity\comment $commentes)
    {
        $this->commentes->removeElement($commentes);
    }

    /**
     * Get commentes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentes()
    {
        return $this->commentes;
    }

    /**
     * Set useres
     *
     * @param \Edu\EleraningBundle\Entity\user $useres
     * @return post
     */
    public function setUseres(\Edu\EleraningBundle\Entity\user $useres)
    {
        $this->useres = $useres;

        return $this;
    }

    /**
     * Get useres
     *
     * @return \Edu\EleraningBundle\Entity\user 
     */
    public function getUseres()
    {
        return $this->useres;
    }

    /**
     * Set lessones
     *
     * @param \Edu\EleraningBundle\Entity\lesson $lessones
     * @return post
     */
    public function setLessones(\Edu\EleraningBundle\Entity\lesson $lessones)
    {
        $this->lessones = $lessones;

        return $this;
    }

    /**
     * Get lessones
     *
     * @return \Edu\EleraningBundle\Entity\lesson 
     */
    public function getLessones()
    {
        return $this->lessones;
    }
}
