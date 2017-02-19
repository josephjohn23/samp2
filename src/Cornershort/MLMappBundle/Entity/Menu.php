<?php

namespace Cornershort\MLMappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu", indexes={@ORM\Index(name="menu_type", columns={"menu_type"})})
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="menu_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $menuId;

    /**
     * @var integer
     *
     * @ORM\Column(name="menu_type", type="integer", nullable=false)
     */
    private $menuType;

    /**
     * @var integer
     *
     * @ORM\Column(name="side_menu", type="integer", nullable=false)
     */
    private $sideMenu;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=false)
     */
    private $fileName;

    /**
     * @var integer
     *
     * @ORM\Column(name="access_level", type="integer", nullable=false)
     */
    private $accessLevel = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="image_type", type="string", length=20, nullable=false)
     */
    private $imageType;

    /**
     * @var string
     *
     * @ORM\Column(name="image_content", type="blob", nullable=false)
     */
    private $imageContent;


}
