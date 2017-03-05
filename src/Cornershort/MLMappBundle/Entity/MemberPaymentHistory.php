<?php

namespace Cornershort\MLMappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MemberPaymentHistory
 *
 * @ORM\Table(name="member_payment_history")
 * @ORM\Entity(repositoryClass="Cornershort\MLMappBundle\Repository\MemberPaymentHistoryRepository")
 */
class MemberPaymentHistory
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
     * @var string
     *
     * @ORM\Column(name="leader_id", type="string", length=8, nullable=false)
     */
    private $leaderId; //PH00000001

    /**
     * @var string
     *
     * @ORM\Column(name="member_id", type="string", length=8, nullable=false)
     */
    private $memberId; //PH00000001

    /**
     * @var string
     *
     * @ORM\Column(name="membership_option", type="string", length=4, nullable=false)
     */
    private $membershipOption; //cash or card

    /**
     * @var integer
     *
     * @ORM\Column(name="activation_level", type="integer", nullable=false)
     */
    private $activationLevel; //1, 2, 3, 4, 5, 6, 7 ..

    /**
     * @var integer
     *
     * @ORM\Column(name="product_amount", type="integer", nullable=false)
     */
    private $productAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_amount", type="integer", nullable=false)
     */
    private $levelAmount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_requested", type="datetime", nullable=false)
     */
    private $dateRequested;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="is_level_requested", type="integer", nullable=false)
     */
    private $isLevelRequested;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_level_upgraded", type="datetime", nullable=false)
     */
    private $dateLevelUpgraded;

    /**
     * @var \boolean
     *
     * @ORM\Column(name="is_level_paid", type="integer", nullable=false)
     */
    private $isLevelPaid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_product_upgraded", type="datetime", nullable=false)
     */
    private $dateProductUpgraded;

    /**
     * @var \boolean
     *
     * @ORM\Column(name="is_product_paid", type="integer", nullable=false)
     */
    private $isProductPaid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_completed", type="datetime", nullable=false)
     */
    private $dateCompleted;

    /**
     * Set leaderId
     *
     * @param string $leaderId
     *
     * @return MemberPaymentHistory
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
     * @return MemberPaymentHistory
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
     * Set membershipOption
     *
     * @param string $membershipOption
     *
     * @return MemberPaymentHistory
     */
    public function setMembershipOption($membershipOption)
    {
        $this->membershipOption = $membershipOption;

        return $this;
    }

    /**
     * Get membershipOption
     *
     * @return string
     */
    public function getMembershipOption()
    {
        return $this->membershipOption;
    }

    /**
     * Set activationLevel
     *
     * @param integer $activationLevel
     *
     * @return MemberPaymentHistory
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
     * Set productAmount
     *
     * @param integer $productAmount
     *
     * @return MemberPaymentHistory
     */
    public function setProductAmount($productAmount)
    {
        $this->productAmount = $productAmount;

        return $this;
    }

    /**
     * Get productAmount
     *
     * @return integer
     */
    public function getProductAmount()
    {
        return $this->productAmount;
    }

    /**
     * Set levelAmount
     *
     * @param integer $levelAmount
     *
     * @return MemberPaymentHistory
     */
    public function setLevelAmount($levelAmount)
    {
        $this->levelAmount = $levelAmount;

        return $this;
    }

    /**
     * Get levelAmount
     *
     * @return integer
     */
    public function getLevelAmount()
    {
        return $this->levelAmount;
    }

    /**
     * Set dateRequested
     *
     * @param \DateTime $dateRequested
     *
     * @return MemberPaymentHistory
     */
    public function setDateRequested($dateRequested)
    {
        $this->dateRequested = $dateRequested;

        return $this;
    }

    /**
     * Get dateRequested
     *
     * @return \DateTime
     */
    public function getDateRequested()
    {
        return $this->dateRequested;
    }

    /**
     * Set dateLevelUpgraded
     *
     * @param \DateTime $dateLevelUpgraded
     *
     * @return MemberPaymentHistory
     */
    public function setDateLevelUpgraded($dateLevelUpgraded)
    {
        $this->dateLevelUpgraded = $dateLevelUpgraded;

        return $this;
    }

    /**
     * Get dateLevelUpgraded
     *
     * @return \DateTime
     */
    public function getDateLevelUpgraded()
    {
        return $this->dateLevelUpgraded;
    }

    /**
     * Set isLevelPaid
     *
     * @param boolean $isLevelPaid
     *
     * @return MemberPaymentHistory
     */
    public function setIsLevelPaid($isLevelPaid)
    {
        $this->isLevelPaid = $isLevelPaid;

        return $this;
    }

    /**
     * Get isLevelPaid
     *
     * @return boolean
     */
    public function getIsLevelPaid()
    {
        return $this->isLevelPaid;
    }

    /**
     * Set dateProductUpgraded
     *
     * @param \DateTime $dateProductUpgraded
     *
     * @return MemberPaymentHistory
     */
    public function setDateProductUpgraded($dateProductUpgraded)
    {
        $this->dateProductUpgraded = $dateProductUpgraded;

        return $this;
    }

    /**
     * Get dateProductUpgraded
     *
     * @return \DateTime
     */
    public function getDateProductUpgraded()
    {
        return $this->dateProductUpgraded;
    }

    /**
     * Set isProductPaid
     *
     * @param boolean $isProductPaid
     *
     * @return MemberPaymentHistory
     */
    public function setIsProductPaid($isProductPaid)
    {
        $this->isProductPaid = $isProductPaid;

        return $this;
    }

    /**
     * Get isProductPaid
     *
     * @return boolean
     */
    public function getIsProductPaid()
    {
        return $this->isProductPaid;
    }

    /**
     * Set dateCompleted
     *
     * @param \DateTime $dateCompleted
     *
     * @return MemberPaymentHistory
     */
    public function setDateCompleted($dateCompleted)
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    /**
     * Get dateCompleted
     *
     * @return \DateTime
     */
    public function getDateCompleted()
    {
        return $this->dateCompleted;
    }

    /**
     * Set isLevelRequested
     *
     * @param integer $isLevelRequested
     *
     * @return MemberPaymentHistory
     */
    public function setIsLevelRequested($isLevelRequested)
    {
        $this->isLevelRequested = $isLevelRequested;

        return $this;
    }

    /**
     * Get isLevelRequested
     *
     * @return integer
     */
    public function getIsLevelRequested()
    {
        return $this->isLevelRequested;
    }
}
