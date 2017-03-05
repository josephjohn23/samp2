<?php

namespace Cornershort\MLMappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductInfo
 *
 * @ORM\Table(name="product_info")
 * @ORM\Entity(repositoryClass="Cornershort\MLMappBundle\Repository\ProductInfoRepository")
 */
class ProductInfo
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
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_desc", type="string", length=20, nullable=false)
     */
    private $productDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=20, nullable=false)
     */
    private $productName;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_amount", type="integer", nullable=false)
     */
    private $productAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="activation_level", type="integer", nullable=false)
     */
    private $activationLevel;

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return ProductInfo
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productDesc
     *
     * @param string $productDesc
     *
     * @return ProductInfo
     */
    public function setProductDesc($productDesc)
    {
        $this->productDesc = $productDesc;

        return $this;
    }

    /**
     * Get productDesc
     *
     * @return string
     */
    public function getProductDesc()
    {
        return $this->productDesc;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return ProductInfo
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productAmount
     *
     * @param integer $productAmount
     *
     * @return ProductInfo
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
     * Set activationLevel
     *
     * @param integer $activationLevel
     *
     * @return ProductInfo
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
