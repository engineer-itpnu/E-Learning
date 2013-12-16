<?php

namespace Edu\EleraningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * memo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class memo
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="memo")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id", nullable=true)
     */
    private $fromuser;

    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="memo")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id", nullable=true)
     */
    private $touser;

    /**
     * @ORM\ManyToOne(targetEntity="memo", inversedBy="replayto")
     * @ORM\JoinColumn(name="memoid", referencedColumnName="id", nullable=true)
     */
    private $answer;

    /**
     * @ORM\OneToMany(targetEntity="memo", mappedBy="answer")
     */
    private $replayto;


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
     * @return memo
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
     * @return memo
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
     * @return memo
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
     * Set useres
     *
     * @param \Edu\EleraningBundle\Entity\user $useres
     * @return memo
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
     * Constructor
     */
    public function __construct()
    {
        $this->replayto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set fromuser
     *
     * @param \Edu\EleraningBundle\Entity\user $fromuser
     * @return memo
     */
    public function setFromuser(\Edu\EleraningBundle\Entity\user $fromuser = null)
    {
        $this->fromuser = $fromuser;

        return $this;
    }

    /**
     * Get fromuser
     *
     * @return \Edu\EleraningBundle\Entity\user 
     */
    public function getFromuser()
    {
        return $this->fromuser;
    }

    /**
     * Set touser
     *
     * @param \Edu\EleraningBundle\Entity\user $touser
     * @return memo
     */
    public function setTouser(\Edu\EleraningBundle\Entity\user $touser = null)
    {
        $this->touser = $touser;

        return $this;
    }

    /**
     * Get touser
     *
     * @return \Edu\EleraningBundle\Entity\user 
     */
    public function getTouser()
    {
        return $this->touser;
    }

    /**
     * Set answer
     *
     * @param \Edu\EleraningBundle\Entity\memo $answer
     * @return memo
     */
    public function setAnswer(\Edu\EleraningBundle\Entity\memo $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \Edu\EleraningBundle\Entity\memo 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Add replayto
     *
     * @param \Edu\EleraningBundle\Entity\memo $replayto
     * @return memo
     */
    public function addReplayto(\Edu\EleraningBundle\Entity\memo $replayto)
    {
        $this->replayto[] = $replayto;

        return $this;
    }

    /**
     * Remove replayto
     *
     * @param \Edu\EleraningBundle\Entity\memo $replayto
     */
    public function removeReplayto(\Edu\EleraningBundle\Entity\memo $replayto)
    {
        $this->replayto->removeElement($replayto);
    }

    /**
     * Get replayto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReplayto()
    {
        return $this->replayto;
    }
}
