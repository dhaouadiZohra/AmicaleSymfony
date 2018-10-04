<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation", indexes={@ORM\Index(name="FK_PRT_MBR_ID", columns={"PRT_MBR_ID"}), @ORM\Index(name="FK_PRT_ACT_ID", columns={"PRT_ACT_ID"})})
 * @ORM\Entity
 */
class Participation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PRT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prtId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRT_MBR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prtMbrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRT_ACT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prtActId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PRT_HEURE", type="datetime", nullable=false)
     */
    private $prtHeure;

    /**
     * @var string
     *
     * @ORM\Column(name="PRT_DESCRIPTION", type="text", length=65535, nullable=false)
     */
    private $prtDescription;

    /**
     * @return int
     */
    public function getPrtId()
    {
        return $this->prtId;
    }

    /**
     * @param int $prtId
     */
    public function setPrtId($prtId)
    {
        $this->prtId = $prtId;
    }

    /**
     * @return int
     */
    public function getPrtMbrId()
    {
        return $this->prtMbrId;
    }

    /**
     * @param int $prtMbrId
     */
    public function setPrtMbrId($prtMbrId)
    {
        $this->prtMbrId = $prtMbrId;
    }

    /**
     * @return int
     */
    public function getPrtActId()
    {
        return $this->prtActId;
    }

    /**
     * @param int $prtActId
     */
    public function setPrtActId($prtActId)
    {
        $this->prtActId = $prtActId;
    }

    /**
     * @return \DateTime
     */
    public function getPrtHeure()
    {
        return $this->prtHeure;
    }

    /**
     * @param \DateTime $prtHeure
     */
    public function setPrtHeure($prtHeure)
    {
        $this->prtHeure = $prtHeure;
    }

    /**
     * @return string
     */
    public function getPrtDescription()
    {
        return $this->prtDescription;
    }

    /**
     * @param string $prtDescription
     */
    public function setPrtDescription($prtDescription)
    {
        $this->prtDescription = $prtDescription;
    }


}

