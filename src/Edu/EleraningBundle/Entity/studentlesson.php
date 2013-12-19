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
     * @ORM\ManyToOne(targetEntity="lesson", inversedBy="studentlesson")
     * @ORM\JoinColumn(name="lessonid", referencedColumnName="id", nullable=true)
     */
    private $lessones;

    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="studentlesson")
     * @ORM\JoinColumn(name="studentid", referencedColumnName="id")
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
     * Set lessones
     *
     * @param \Edu\EleraningBundle\Entity\lesson $lessones
     * @return studentlesson
     */
    public function setLessones(\Edu\EleraningBundle\Entity\lesson $lessones = null)
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

    /**
     * Set useres
     *
     * @param \Edu\EleraningBundle\Entity\user $useres
     * @return studentlesson
     */
    public function setUseres(\Edu\EleraningBundle\Entity\user $useres = null)
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
}
