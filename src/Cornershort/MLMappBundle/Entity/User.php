<?php

namespace Cornershort\MLMappBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"email"})})
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=32, options={"default" = ""})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=32, options={"default" = ""})
     */
    private $lastName;

    /**
     * @var integer
     *
     * @ORM\Column(name="access_level", type="integer", options={"default" = 0})
     */
    private $accessLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_key", type="string", length=32, options={"default" = ""})
     */
    private $activationKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_logout", type="datetime", nullable=false)
     */
    private $lastLogout;

    public function __construct() {
        parent::__construct();
        // your own logic
        $this->lastLogout = new \DateTime('0000-00-00 00:00:00');
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set accessLevel
     *
     * @param integer $accessLevel
     * @return User
     */
    public function setAccessLevel($accessLevel) {
        $this->accessLevel = $accessLevel;

        return $this;
    }

    /**
     * Get accessLevel
     *
     * @return integer
     */
    public function getAccessLevel() {
        return $this->accessLevel;
    }

    /**
     * Get lastLogin
     *
     * @return datettime
     */
    public function getLastLogin() {
        return $this->lastLogin;
    }

    /**
     * set lastLogout
     *
     * @param DateTime object $lastLogout
     * @return User
     */
    public function setLastLogout($lastLogout) {
        $this->lastLogout = $lastLogout;

        return $this;
    }

    /**
     * Get lastLogout
     *
     * @return datettime
     */
    public function getLastLogout() {
        return $this->lastLogout;
    }


    /**
     * Set activationKey
     *
     * @param string $activationKey
     * @return string
     */
    public function setActivationKey($activationKey) {
        $this->activationKey = $activationKey;

        return $this;
    }

    /**
     * Get activationKey
     *
     * @return string
     */
    public function getActivationKey() {
        return $this->activationKey;
    }
}
