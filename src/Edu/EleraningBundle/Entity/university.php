<?php

namespace Edu\EleraningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * university
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class university
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="date")
     */
    private $enddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="regdate", type="date")
     */
    private $regdate;

    /**
     * @ORM\OneToMany(targetEntity="financial", mappedBy="university")
     */
    private $financiales;

    /**
     * @ORM\OneToMany(targetEntity="user", mappedBy="university")
     */
    private $useres;

    /**
     * @ORM\OneToMany(targetEntity="grouplesson", mappedBy="university")
     */
    private $gouplessonss;

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
     * Set name
     *
     * @param string $name
     * @return university
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return university
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
     * Set website
     *
     * @param string $website
     * @return university
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return university
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->useres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set financiales
     *
     * @param \Edu\EleraningBundle\Entity\financial $financiales
     * @return university
     */
    public function setFinanciales(\Edu\EleraningBundle\Entity\financial $financiales)
    {
        $this->financiales = $financiales;

        return $this;
    }

    /**
     * Get financiales
     *
     * @return \Edu\EleraningBundle\Entity\financial 
     */
    public function getFinanciales()
    {
        return $this->financiales;
    }

    /**
     * Add useres
     *
     * @param \Edu\EleraningBundle\Entity\user $useres
     * @return university
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

    /**
     * Set regdate
     *
     * @param \DateTime $regdate
     * @return university
     */
    public function setRegdate($regdate)
    {
        $this->regdate = $regdate;

        return $this;
    }

    /**
     * Get regdate
     *
     * @return \DateTime 
     */
    public function getRegdate()
    {
        return $this->regdate;
    }

    /**
     * Add financiales
     *
     * @param \Edu\EleraningBundle\Entity\financial $financiales
     * @return university
     */
    public function addFinanciale(\Edu\EleraningBundle\Entity\financial $financiales)
    {
        $this->financiales[] = $financiales;

        return $this;
    }

    /**
     * Remove financiales
     *
     * @param \Edu\EleraningBundle\Entity\financial $financiales
     */
    public function removeFinanciale(\Edu\EleraningBundle\Entity\financial $financiales)
    {
        $this->financiales->removeElement($financiales);
    }

    /**
     * Add gouplessonss
     *
     * @param \Edu\EleraningBundle\Entity\grouplesson $gouplessonss
     * @return university
     */
    public function addGouplessonss(\Edu\EleraningBundle\Entity\grouplesson $gouplessonss)
    {
        $this->gouplessonss[] = $gouplessonss;

        return $this;
    }

    /**
     * Remove gouplessonss
     *
     * @param \Edu\EleraningBundle\Entity\grouplesson $gouplessonss
     */
    public function removeGouplessonss(\Edu\EleraningBundle\Entity\grouplesson $gouplessonss)
    {
        $this->gouplessonss->removeElement($gouplessonss);
    }

    /**
     * Get gouplessonss
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGouplessonss()
    {
        return $this->gouplessonss;
    }
}
