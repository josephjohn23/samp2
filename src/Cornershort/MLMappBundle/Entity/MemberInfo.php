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
}
