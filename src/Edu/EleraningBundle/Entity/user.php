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

    public function __construct()
    {
        parent::__construct();
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


}
