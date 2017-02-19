<?php

namespace Cornershort\MLMappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuChild
 *
 * @ORM\Table(name="menu_child", indexes={@ORM\Index(name="menu_parent_id", columns={"menu_parent_id"})})
 * @ORM\Entity
 */
class MenuChild
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="menu_parent_id", type="integer", nullable=false)
     */
    private $menuParentId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    private $route;

    /**
     * @var integer
     *
     * @ORM\Column(name="access_level", type="integer", nullable=false)
     */
    private $accessLevel;
}
