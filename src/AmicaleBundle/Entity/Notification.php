<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="NTF_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ntfId;

    /**
     * @var string
     *
     * @ORM\Column(name="NTF_MESSAGE", type="string", length=255, nullable=false)
     */
    private $ntfMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="NTF_DATE", type="date", nullable=false)
     */
    private $ntfDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="NTF_HEURE", type="time", nullable=false)
     */
    private $ntfHeure;

    /**
     * @var integer
     *
     * @ORM\Column(name="NTF_MBR_ID", type="integer", nullable=true)
     */
    private $ntfMbrId;


}

