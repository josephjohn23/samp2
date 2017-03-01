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
     * @ORM\Column(name="date_level_upgraded", type="datetime", nullable=false)
     */
    private $dateLevelUpgraded;

    /**
     * @var \boolean
     *
     * @ORM\Column(name="is_level_paid", type="boolean", nullable=false)
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
     * @ORM\Column(name="is_product_paid", type="boolean", nullable=false)
     */
    private $isProductPaid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_completed", type="datetime", nullable=false)
     */
    private $dateCompleted;
}
