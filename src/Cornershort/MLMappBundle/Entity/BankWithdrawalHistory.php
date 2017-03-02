<?php

namespace Cornershort\MLMappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BankWithdrawalHistory
 *
 * @ORM\Table(name="bank_withdrawal_history")
 * @ORM\Entity(repositoryClass="Cornershort\MLMappBundle\Repository\BankWithdrawalHistoryRepository")
 */
class BankWithdrawalHistory
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
     * @ORM\Column(name="desc", type="string", length=20, nullable=false)
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="transfer_to_name", type="string", length=20, nullable=false)
     */
    private $transferToName;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="membership_option", type="string", length=4, nullable=false)
     */
    private $membershipOption; //cash or card

    /**
     * @var string
     *
     * @ORM\Column(name="transfer_by", type="string", length=20, nullable=false)
     */
    private $transferBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_transfered", type="datetime", nullable=false)
     */
    private $dateTransfered;

    /**
     * Set desc
     *
     * @param string $desc
     *
     * @return BankWithdrawalHistory
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set transferToName
     *
     * @param string $transferToName
     *
     * @return BankWithdrawalHistory
     */
    public function setTransferToName($transferToName)
    {
        $this->transferToName = $transferToName;

        return $this;
    }

    /**
     * Get transferToName
     *
     * @return string
     */
    public function getTransferToName()
    {
        return $this->transferToName;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return BankWithdrawalHistory
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set membershipOption
     *
     * @param string $membershipOption
     *
     * @return BankWithdrawalHistory
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
     * Set transferBy
     *
     * @param string $transferBy
     *
     * @return BankWithdrawalHistory
     */
    public function setTransferBy($transferBy)
    {
        $this->transferBy = $transferBy;

        return $this;
    }

    /**
     * Get transferBy
     *
     * @return string
     */
    public function getTransferBy()
    {
        return $this->transferBy;
    }

    /**
     * Set dateTransfered
     *
     * @param \DateTime $dateTransfered
     *
     * @return BankWithdrawalHistory
     */
    public function setDateTransfered($dateTransfered)
    {
        $this->dateTransfered = $dateTransfered;

        return $this;
    }

    /**
     * Get dateTransfered
     *
     * @return \DateTime
     */
    public function getDateTransfered()
    {
        return $this->dateTransfered;
    }
}
