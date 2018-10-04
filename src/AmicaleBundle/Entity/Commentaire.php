<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="FK_CMTR_MBR_ID", columns={"CMTR_MBR_ID"}), @ORM\Index(name="FK_CMTR_PUB_ID", columns={"CMTR_PUB_ID"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CMTR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cmtrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CMTR_DATE", type="datetime", nullable=false)
     */
    private $cmtrDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CMTR_HEURE", type="time", nullable=false)
     */
    private $cmtrHeure;

    /**
     * @var string
     *
     * @ORM\Column(name="CMTR_DESCRIPTION", type="text", length=65535, nullable=false)
     */
    private $cmtrDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="CMTR_MBR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cmtrMbrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CMTR_PUB_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cmtrPubId;


}

