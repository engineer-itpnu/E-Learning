<?php

namespace Edu\EleraningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * studentlesson
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class studentlesson
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
     * @var boolean
     *
     * @ORM\Column(name="accept", type="boolean")
     */
    private $accept;

    /**
     * @ORM\OneToMany(targetEntity="lesson", mappedBy="studentlesson")
     */
    private $lessones;

    /**
     * @ORM\OneToMany(targetEntity="user", mappedBy="studentlesson")
     */
    private $useres;


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
     * Set accept
     *
     * @param boolean $accept
     * @return studentlesson
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;

        return $this;
    }

    /**
     * Get accept
     *
     * @return boolean 
     */
    public function getAccept()
    {
        return $this->accept;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lessones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->useres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lessones
     *
     * @param \Edu\EleraningBundle\Entity\lesson $lessones
     * @return studentlesson
     */
    public function addLessone(\Edu\EleraningBundle\Entity\lesson $lessones)
    {
        $this->lessones[] = $lessones;

        return $this;
    }

    /**
     * Remove lessones
     *
     * @param \Edu\EleraningBundle\Entity\lesson $lessones
     */
    public function removeLessone(\Edu\EleraningBundle\Entity\lesson $lessones)
    {
        $this->lessones->removeElement($lessones);
    }

    /**
     * Get lessones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLessones()
    {
        return $this->lessones;
    }

    /**
     * Add useres
     *
     * @param \Edu\EleraningBundle\Entity\user $useres
     * @return studentlesson
     */
    public function addUsere(\Edu\EleraningBundle\Entity\user $useres)
    {
        $this->useres[] = $useres;

        return $this;
    }

    /**
     * Remove useres
     *
     * @param \Edu\EleraningBundle\Entity\user $useres
     */
    public function removeUsere(\Edu\EleraningBundle\Entity\user $useres)
    {
        $this->useres->removeElement($useres);
    }

    /**
     * Get useres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUseres()
    {
        return $this->useres;
    }
}
