<?php

namespace Cornershort\MLMappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LevelInfo
 *
 * @ORM\Table(name="level_info")
 * @ORM\Entity(repositoryClass="Cornershort\MLMappBundle\Repository\LevelInfoRepository")
 */
class LevelInfo
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
     * @ORM\Column(name="level_id", type="integer", nullable=false)
     */
    private $levelId;

    /**
     * @var string
     *
     * @ORM\Column(name="level_desc", type="string", length=20, nullable=false)
     */
    private $levelDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="level_name", type="string", length=20, nullable=false)
     */
    private $levelName;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_amount", type="integer", nullable=false)
     */
    private $levelAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="activation_level", type="integer", nullable=false)
     */
    private $activationLevel;
}
