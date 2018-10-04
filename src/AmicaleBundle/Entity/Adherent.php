<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adherent
 *
 * @ORM\Table(name="adherent", indexes={@ORM\Index(name="FK_ADR_MBR_ID", columns={"ADR_MBR_ID"})})
 * @ORM\Entity
 */
class Adherent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ADR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $adrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ADR_MBR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $adrMbrId;


}

