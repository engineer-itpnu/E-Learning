<?php

namespace Edu\EleraningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * lesson
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class lesson
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="explaination", type="string", length=255, nullable=true)
     */
    private $explaination;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="grouplesson", inversedBy="lesson")
     * @ORM\JoinColumn(name="groupid", referencedColumnName="id", nullable=false)
     */
    private $grouplesson;

    /**
     * @ORM\OneToMany(targetEntity="studentlesson", mappedBy="lessones")
     */
    private $studentlesson;

    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="lesson")
     * @ORM\JoinColumn(name="teacherid", referencedColumnName="id", nullable=false)
     */
    private $teacher;

    /**
     * @ORM\OneToMany(targetEntity="post", mappedBy="lesson")
     */
    private $postes;

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
     * Set explaination
     *
     * @param string $explaination
     * @return lesson
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
     * Set password
     *
     * @param string $password
     * @return lesson
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }



    /**
     * Set grouplesson
     *
     * @param \Edu\EleraningBundle\Entity\grouplesson $grouplesson
     * @return lesson
     */
    public function setGrouplesson(\Edu\EleraningBundle\Entity\grouplesson $grouplesson)
    {
        $this->grouplesson = $grouplesson;

        return $this;
    }

    /**
     * Get grouplesson
     *
     * @return \Edu\EleraningBundle\Entity\grouplesson 
     */
    public function getGrouplesson()
    {
        return $this->grouplesson;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->studentlesson = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set teacher
     *
     * @param \Edu\EleraningBundle\Entity\user $teacher
     * @return lesson
     */
    public function setTeacher(\Edu\EleraningBundle\Entity\user $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \Edu\EleraningBundle\Entity\user 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Add postes
     *
     * @param \Edu\EleraningBundle\Entity\post $postes
     * @return lesson
     */
    public function addPoste(\Edu\EleraningBundle\Entity\post $postes)
    {
        $this->postes[] = $postes;

        return $this;
    }

    /**
     * Remove postes
     *
     * @param \Edu\EleraningBundle\Entity\post $postes
     */
    public function removePoste(\Edu\EleraningBundle\Entity\post $postes)
    {
        $this->postes->removeElement($postes);
    }

    /**
     * Get postes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostes()
    {
        return $this->postes;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return lesson
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
     * Add studentlesson
     *
     * @param \Edu\EleraningBundle\Entity\studentlesson $studentlesson
     * @return lesson
     */
    public function addStudentlesson(\Edu\EleraningBundle\Entity\studentlesson $studentlesson)
    {
        $this->studentlesson[] = $studentlesson;

        return $this;
    }

    /**
     * Remove studentlesson
     *
     * @param \Edu\EleraningBundle\Entity\studentlesson $studentlesson
     */
    public function removeStudentlesson(\Edu\EleraningBundle\Entity\studentlesson $studentlesson)
    {
        $this->studentlesson->removeElement($studentlesson);
    }

    /**
     * Get studentlesson
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudentlesson()
    {
        return $this->studentlesson;
    }
}
