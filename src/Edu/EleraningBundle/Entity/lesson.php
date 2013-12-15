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
     * @ORM\Column(name="explaination", type="string", length=255)
     */
    private $explaination;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="grouplesson", inversedBy="lessones")
     * @ORM\JoinColumn(name="groupid", referencedColumnName="id", nullable=false)
     */
    private $grouplesson;

    /**
     * @ORM\ManyToOne(targetEntity="studentlesson", inversedBy="lesson")
     * @ORM\JoinColumn(name="groupid", referencedColumnName="id", nullable=false)
     */
    private $studentlesson;

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
     * Set studentlesson
     *
     * @param \Edu\EleraningBundle\Entity\studentlesson $studentlesson
     * @return lesson
     */
    public function setStudentlesson(\Edu\EleraningBundle\Entity\studentlesson $studentlesson)
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
