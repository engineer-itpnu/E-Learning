<?php

namespace Edu\EleraningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class comment
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
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="post", inversedBy="comment")
     * @ORM\JoinColumn(name="postid", referencedColumnName="id", nullable=false)
     */
    private $postes;

    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="comment")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id", nullable=false)
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
     * Set text
     *
     * @param string $text
     * @return comment
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
     * Set date
     *
     * @param \DateTime $date
     * @return comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set postes
     *
     * @param \Edu\EleraningBundle\Entity\post $postes
     * @return comment
     */
    public function setPostes(\Edu\EleraningBundle\Entity\post $postes)
    {
        $this->postes = $postes;

        return $this;
    }

    /**
     * Get postes
     *
     * @return \Edu\EleraningBundle\Entity\post 
     */
    public function getPostes()
    {
        return $this->postes;
    }

    /**
     * Set useres
     *
     * @param \Edu\EleraningBundle\Entity\user $useres
     * @return comment
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
}
