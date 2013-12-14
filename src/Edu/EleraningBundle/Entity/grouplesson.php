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
}
