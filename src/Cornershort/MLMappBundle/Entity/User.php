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

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="bank_acct_no", type="integer", nullable=false)
     */
    private $bankAcctNo;

    /**
     * @var string
     *
     * @ORM\Column(name="date_of_birth", type="string", length=10, nullable=false)
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="mobile_number", type="integer", nullable=false)
     */
    private $mobileNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="home_add_house_no", type="integer", nullable=false)
     */
    private $homeAddrHouseNo;

    /**
     * @var string
     *
     * @ORM\Column(name="home_addr_street", type="string", length=50, nullable=false)
     */
    private $homeAddrStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="home_addr_brgy", type="string", length=50, nullable=false)
     */
    private $homeAddrBrgy;

    /**
     * @var string
     *
     * @ORM\Column(name="home_addr_subd", type="string", length=50, nullable=false)
     */
    private $homeAddrSubd;

    /**
     * @var string
     *
     * @ORM\Column(name="home_addr_city", type="string", length=50, nullable=false)
     */
    private $homeAddrCity;

    /**
     * @var string
     *
     * @ORM\Column(name="home_addr_province", type="string", length=50, nullable=false)
     */
    private $homeAddrProvince;

    /**
     * @var string
     *
     * @ORM\Column(name="leader_id", type="string", length=8, nullable=false)
     */
    private $leaderId;

    /**
     * @var string
     *
     * @ORM\Column(name="member_id", type="string", length=8, nullable=false)
     */
    private $memberId;

    /**
     * @var string
     *
     * @ORM\Column(name="acct_id", type="string", length=8, nullable=false)
     */
    private $acctId;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_earnings", type="integer", nullable=false)
     */
    private $totalEarnings;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="acct_exp_date", type="datetime", nullable=false)
     */
    private $acctExpDate;

    /**
     * @var string
     *
     * @ORM\Column(name="next_leader_id", type="string", length=8, nullable=false)
     */
    private $nextLeaderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="activation_level", type="integer", nullable=false)
     */
    private $activationLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=false)
     */
    private $status; //(active / expired / inactive / active_requested)

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

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return User
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set bankAcctNo
     *
     * @param integer $bankAcctNo
     *
     * @return User
     */
    public function setBankAcctNo($bankAcctNo)
    {
        $this->bankAcctNo = $bankAcctNo;

        return $this;
    }

    /**
     * Get bankAcctNo
     *
     * @return integer
     */
    public function getBankAcctNo()
    {
        return $this->bankAcctNo;
    }

    /**
     * Set dateOfBirth
     *
     * @param string $dateOfBirth
     *
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set mobileNumber
     *
     * @param integer $mobileNumber
     *
     * @return User
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return integer
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set homeAddrHouseNo
     *
     * @param integer $homeAddrHouseNo
     *
     * @return User
     */
    public function setHomeAddrHouseNo($homeAddrHouseNo)
    {
        $this->homeAddrHouseNo = $homeAddrHouseNo;

        return $this;
    }

    /**
     * Get homeAddrHouseNo
     *
     * @return integer
     */
    public function getHomeAddrHouseNo()
    {
        return $this->homeAddrHouseNo;
    }

    /**
     * Set homeAddrStreet
     *
     * @param string $homeAddrStreet
     *
     * @return User
     */
    public function setHomeAddrStreet($homeAddrStreet)
    {
        $this->homeAddrStreet = $homeAddrStreet;

        return $this;
    }

    /**
     * Get homeAddrStreet
     *
     * @return string
     */
    public function getHomeAddrStreet()
    {
        return $this->homeAddrStreet;
    }

    /**
     * Set homeAddrBrgy
     *
     * @param string $homeAddrBrgy
     *
     * @return User
     */
    public function setHomeAddrBrgy($homeAddrBrgy)
    {
        $this->homeAddrBrgy = $homeAddrBrgy;

        return $this;
    }

    /**
     * Get homeAddrBrgy
     *
     * @return string
     */
    public function getHomeAddrBrgy()
    {
        return $this->homeAddrBrgy;
    }

    /**
     * Set homeAddrSubd
     *
     * @param string $homeAddrSubd
     *
     * @return User
     */
    public function setHomeAddrSubd($homeAddrSubd)
    {
        $this->homeAddrSubd = $homeAddrSubd;

        return $this;
    }

    /**
     * Get homeAddrSubd
     *
     * @return string
     */
    public function getHomeAddrSubd()
    {
        return $this->homeAddrSubd;
    }

    /**
     * Set homeAddrCity
     *
     * @param string $homeAddrCity
     *
     * @return User
     */
    public function setHomeAddrCity($homeAddrCity)
    {
        $this->homeAddrCity = $homeAddrCity;

        return $this;
    }

    /**
     * Get homeAddrCity
     *
     * @return string
     */
    public function getHomeAddrCity()
    {
        return $this->homeAddrCity;
    }

    /**
     * Set homeAddrProvince
     *
     * @param string $homeAddrProvince
     *
     * @return User
     */
    public function setHomeAddrProvince($homeAddrProvince)
    {
        $this->homeAddrProvince = $homeAddrProvince;

        return $this;
    }

    /**
     * Get homeAddrProvince
     *
     * @return string
     */
    public function getHomeAddrProvince()
    {
        return $this->homeAddrProvince;
    }

    /**
     * Set leaderId
     *
     * @param string $leaderId
     *
     * @return User
     */
    public function setLeaderId($leaderId)
    {
        $this->leaderId = $leaderId;

        return $this;
    }

    /**
     * Get leaderId
     *
     * @return string
     */
    public function getLeaderId()
    {
        return $this->leaderId;
    }

    /**
     * Set memberId
     *
     * @param string $memberId
     *
     * @return User
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }

    /**
     * Get memberId
     *
     * @return string
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Set acctId
     *
     * @param string $acctId
     *
     * @return User
     */
    public function setAcctId($acctId)
    {
        $this->acctId = $acctId;

        return $this;
    }

    /**
     * Get acctId
     *
     * @return string
     */
    public function getAcctId()
    {
        return $this->acctId;
    }

    /**
     * Set totalEarnings
     *
     * @param integer $totalEarnings
     *
     * @return User
     */
    public function setTotalEarnings($totalEarnings)
    {
        $this->totalEarnings = $totalEarnings;

        return $this;
    }

    /**
     * Get totalEarnings
     *
     * @return integer
     */
    public function getTotalEarnings()
    {
        return $this->totalEarnings;
    }

    /**
     * Set acctExpDate
     *
     * @param \DateTime $acctExpDate
     *
     * @return User
     */
    public function setAcctExpDate($acctExpDate)
    {
        $this->acctExpDate = $acctExpDate;

        return $this;
    }

    /**
     * Get acctExpDate
     *
     * @return \DateTime
     */
    public function getAcctExpDate()
    {
        return $this->acctExpDate;
    }

    /**
     * Set nextLeaderId
     *
     * @param string $nextLeaderId
     *
     * @return User
     */
    public function setNextLeaderId($nextLeaderId)
    {
        $this->nextLeaderId = $nextLeaderId;

        return $this;
    }

    /**
     * Get nextLeaderId
     *
     * @return string
     */
    public function getNextLeaderId()
    {
        return $this->nextLeaderId;
    }

    /**
     * Set activationLevel
     *
     * @param integer $activationLevel
     *
     * @return User
     */
    public function setActivationLevel($activationLevel)
    {
        $this->activationLevel = $activationLevel;

        return $this;
    }

    /**
     * Get activationLevel
     *
     * @return integer
     */
    public function getActivationLevel()
    {
        return $this->activationLevel;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
