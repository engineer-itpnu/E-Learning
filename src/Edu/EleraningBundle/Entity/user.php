<?php

namespace Edu\EleraningBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * user
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class user extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=50)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lanme", type="string", length=50)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="melicode", type="string", length=50)
     */
    private $melicode;

    /**
     * @ORM\ManyToOne(targetEntity="university", inversedBy="user")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $universities;

    /**
     * @ORM\OneToMany(targetEntity="comment", mappedBy="user")
     */
    private $commentes;

    /**
     * @ORM\OneToMany(targetEntity="memo", mappedBy="user")
     */
    private $memoes;

    /**
     * @ORM\ManyToOne(targetEntity="studentlesson", inversedBy="user")
     * @ORM\JoinColumn(name="studentlesson_id", referencedColumnName="id")
     */
    protected $studentlesson;

    public function __construct()
    {
        parent::__construct();
        $this->commentes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->memoes = new \Doctrine\Common\Collections\ArrayCollection();
        // your own logic
    }
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
     * Set fname
     *
     * @param string $fname
     * @return user
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string 
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lanme
     *
     * @param string $lanme
     * @return user
     */
    public function setLanme($lanme)
    {
        $this->lanme = $lanme;

        return $this;
    }

    /**
     * Get lanme
     *
     * @return string 
     */
    public function getLanme()
    {
        return $this->lanme;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return user
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set melicode
     *
     * @param string $melicode
     * @return user
     */
    public function setMelicode($melicode)
    {
        $this->melicode = $melicode;

        return $this;
    }

    /**
     * Get melicode
     *
     * @return string 
     */
    public function getMelicode()
    {
        return $this->melicode;
    }

    /**
     * Set lname
     *
     * @param string $lname
     * @return user
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get lname
     *
     * @return string 
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set universities
     *
     * @param \Edu\EleraningBundle\Entity\university $universities
     * @return user
     */
    public function setUniversities(\Edu\EleraningBundle\Entity\university $universities = null)
    {
        $this->universities = $universities;

        return $this;
    }

    /**
     * Get universities
     *
     * @return \Edu\EleraningBundle\Entity\university 
     */
    public function getUniversities()
    {
        return $this->universities;
    }

    /**
     * Add commentes
     *
     * @param \Edu\EleraningBundle\Entity\comment $commentes
     * @return user
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
     * Add memoes
     *
     * @param \Edu\EleraningBundle\Entity\memo $memoes
     * @return user
     */
    public function addMemo(\Edu\EleraningBundle\Entity\memo $memoes)
    {
        $this->memoes[] = $memoes;

        return $this;
    }

    /**
     * Remove memoes
     *
     * @param \Edu\EleraningBundle\Entity\memo $memoes
     */
    public function removeMemo(\Edu\EleraningBundle\Entity\memo $memoes)
    {
        $this->memoes->removeElement($memoes);
    }

    /**
     * Get memoes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMemoes()
    {
        return $this->memoes;
    }

    /**
     * Set studentlesson
     *
     * @param \Edu\EleraningBundle\Entity\studentlesson $studentlesson
     * @return user
     */
    public function setStudentlesson(\Edu\EleraningBundle\Entity\studentlesson $studentlesson = null)
    {
        $this->studentlesson = $studentlesson;

        return $this;
    }

    /**
     * Get studentlesson
     *
     * @return \Edu\EleraningBundle\Entity\studentlesson 
     */
    public function getStudentlesson()
    {
        return $this->studentlesson;
    }
}
