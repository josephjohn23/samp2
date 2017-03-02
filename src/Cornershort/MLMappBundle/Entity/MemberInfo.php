<?php

namespace Cornershort\MLMappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MemberInfo
 *
 * @ORM\Table(name="member_info")
 * @ORM\Entity(repositoryClass="Cornershort\MLMappBundle\Repository\MemberInfoRepository")
 */
class MemberInfo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

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
     * @ORM\Column(name="leaders_id", type="string", length=8, nullable=false)
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

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
     * @return MemberInfo
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
