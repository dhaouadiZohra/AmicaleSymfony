<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administratteur
 *
 * @ORM\Table(name="administratteur", indexes={@ORM\Index(name="FK_ADM_MBR_ID", columns={"ADM_MBR_ID"})})
 * @ORM\Entity
 */
class Administratteur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ADM_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $admId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ADM_MBR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $admMbrId;


}

