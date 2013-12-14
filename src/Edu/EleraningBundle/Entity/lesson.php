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
}
