<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table(name="feedback", indexes={@ORM\Index(name="FK_FDB_PRT_ID", columns={"FDB_PRT_ID"})})
 * @ORM\Entity
 */
class Feedback
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FDB_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fdbId;

    /**
     * @var string
     *
     * @ORM\Column(name="FDB_DESCRIPTION", type="text", length=65535, nullable=false)
     */
    private $fdbDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FDB_DATE", type="date", nullable=false)
     */
    private $fdbDate;

    /**
     * @var float
     *
     * @ORM\Column(name="FDB_VOTE", type="float", precision=10, scale=0, nullable=false)
     */
    private $fdbVote;

    /**
     * @var integer
     *
     * @ORM\Column(name="FDB_PRT_ID", type="integer", nullable=true)
     */
    private $fdbPrtId;


}

