<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recevoir
 *
 * @ORM\Table(name="recevoir", indexes={@ORM\Index(name="FK_NTF_MBR_ID", columns={"NTF_MBR_ID"})})
 * @ORM\Entity
 */
class Recevoir
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MBR_NTF_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $mbrNtfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="NTF_MBR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ntfMbrId;


}

