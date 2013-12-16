<?php

namespace Edu\EleraningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * grouplesson
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class grouplesson
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
     * @ORM\Column(name="explaination", type="string", length=255)
     */
    private $explaination;

    /**
     * @ORM\OneToMany(targetEntity="lesson", mappedBy="grouplesson")
     */
    private $lessones;


    /**
     * @ORM\ManyToOne(targetEntity="university", inversedBy="grouplesson")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    private $universityid;

    public function __construct()
    {
        parent::__construct();
        $this->lessones = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return grouplesson
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
     * Set explaination
     *
     * @param string $explaination
     * @return grouplesson
     */
    public function setExplaination($explaination)
    {
        $this->explaination = $explaination;

        return $this;
    }

    /**
     * Get explaination
     *
     * @return string 
     */
    public function getExplaination()
    {
        return $this->explaination;
    }

    /**
     * Add lessones
     *
     * @param \Edu\EleraningBundle\Entity\lesson $lessones
     * @return grouplesson
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
     * Set universityid
     *
     * @param \Edu\EleraningBundle\Entity\university $universityid
     * @return grouplesson
     */
    public function setUniversityid(\Edu\EleraningBundle\Entity\university $universityid = null)
    {
        $this->universityid = $universityid;

        return $this;
    }

    /**
     * Get universityid
     *
     * @return \Edu\EleraningBundle\Entity\university 
     */
    public function getUniversityid()
    {
        return $this->universityid;
    }
}
