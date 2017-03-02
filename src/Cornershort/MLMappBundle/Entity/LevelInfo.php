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

    /**
     * Set levelId
     *
     * @param integer $levelId
     *
     * @return LevelInfo
     */
    public function setLevelId($levelId)
    {
        $this->levelId = $levelId;

        return $this;
    }

    /**
     * Get levelId
     *
     * @return integer
     */
    public function getLevelId()
    {
        return $this->levelId;
    }

    /**
     * Set levelDesc
     *
     * @param string $levelDesc
     *
     * @return LevelInfo
     */
    public function setLevelDesc($levelDesc)
    {
        $this->levelDesc = $levelDesc;

        return $this;
    }

    /**
     * Get levelDesc
     *
     * @return string
     */
    public function getLevelDesc()
    {
        return $this->levelDesc;
    }

    /**
     * Set levelName
     *
     * @param string $levelName
     *
     * @return LevelInfo
     */
    public function setLevelName($levelName)
    {
        $this->levelName = $levelName;

        return $this;
    }

    /**
     * Get levelName
     *
     * @return string
     */
    public function getLevelName()
    {
        return $this->levelName;
    }

    /**
     * Set levelAmount
     *
     * @param integer $levelAmount
     *
     * @return LevelInfo
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
     * Set activationLevel
     *
     * @param integer $activationLevel
     *
     * @return LevelInfo
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
}
