<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="FK_PHT_GLR_ID", columns={"PHT_GLR_ID"})})
 * @ORM\Entity
 */
class Photo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PHT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phtId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PHT_DATE", type="date", nullable=false)
     */
    private $phtDate;

    /**
     * @var string
     *
     * @ORM\Column(name="PHT_URL", type="string", length=100, nullable=false)
     */
    private $phtUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="PHT_GLR_ID", type="integer", nullable=true)
     */
    private $phtGlrId;


}

