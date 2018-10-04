<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consulter
 *
 * @ORM\Table(name="consulter", indexes={@ORM\Index(name="FK_GLR_MBR_ID", columns={"GLR_MBR_ID"})})
 * @ORM\Entity
 */
class Consulter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MBR_GLR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $mbrGlrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="GLR_MBR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $glrMbrId;


}

