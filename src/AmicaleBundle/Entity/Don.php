<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don", indexes={@ORM\Index(name="FK_DON_CH_ID", columns={"DON_CH_ID"}), @ORM\Index(name="FK_DON_MBR_ID", columns={"DON_MBR_ID"})})
 * @ORM\Entity
 */
class Don
{
    /**
     * @var integer
     *
     * @ORM\Column(name="DON_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $donId;

    /**
     * @var integer
     *
     * @ORM\Column(name="DON_MONTANT", type="integer", nullable=false)
     */
    private $donMontant;

    /**
     * @var integer
     *
     * @ORM\Column(name="DON_RECU", type="integer", nullable=false)
     */
    private $donRecu;

    /**
     * @var integer
     *
     * @ORM\Column(name="DON_CH_ID", type="integer", nullable=true)
     */
    private $donChId;

    /**
     * @var integer
     *
     * @ORM\Column(name="DON_MBR_ID", type="integer", nullable=true)
     */
    private $donMbrId;


}

