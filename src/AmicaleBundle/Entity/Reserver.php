<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserver
 *
 * @ORM\Table(name="reserver", indexes={@ORM\Index(name="FK_RES_MBR_ID", columns={"RES_MBR_ID"})})
 * @ORM\Entity
 */
class Reserver
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="MBR_RES_ID", type="integer", nullable=false)
     *
     */
    private $mbrResId;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumn(name="RES_MBR_ID", referencedColumnName="RES_ID")
     */
    private $resMbrId;

    /**
     * @return int
     */
    public function getMbrResId()
    {
        return $this->mbrResId;
    }

    /**
     * @param int $mbrResId
     */
    public function setMbrResId($mbrResId)
    {
        $this->mbrResId = $mbrResId;
    }

    /**
     * @return int
     */
    public function getResMbrId()
    {
        return $this->resMbrId;
    }

    /**
     * @param int $resMbrId
     */
    public function setResMbrId($resMbrId)
    {
        $this->resMbrId = $resMbrId;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}

