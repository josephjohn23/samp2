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
}
