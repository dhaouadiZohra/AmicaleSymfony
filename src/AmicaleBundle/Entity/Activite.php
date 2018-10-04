<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity
 */
class Activite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ACT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $actId;

    /**
     * @var string
     *
     * @ORM\Column(name="ACT_INTITULE", type="string", length=255, nullable=false)
     */
    private $actIntitule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ACT_LIEU", type="string", nullable=false)
     */
    private $actLieu;

    /**
     * @var string
     *
     * @ORM\Column(name="ACT_DESCRIPTION", type="text", length=65535, nullable=false)
     */
    private $actDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="ACT_SUP_MULTIMEDIA", type="string", length=255, nullable=false)
     */
    private $actSupMultimedia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ACT_DATE_DEB", type="date", nullable=false)
     */
    private $actDateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ACT_DATE_FIN", type="date", nullable=false)
     */
    private $actDateFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ACT_HEURE_DEB", type="time", nullable=false)
     */
    private $actHeureDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ACT_HEURE_FIN", type="time", nullable=false)
     */
    private $actHeureFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ACT_TYPE", type="string", length=10, nullable=false)
     */
    private $actType;

    /**
     * @var float
     *
     * @ORM\Column(name="ACT_CH_MONTANT", type="float", precision=10, scale=0, nullable=true)
     */
    private $actChMontant;

    /**
     * @var integer
     *
     * @ORM\Column(name="ACT_CH_MNT_ACQ", type="integer", nullable=true)
     */
    private $actChMntAcq;

    /**
     * @var string
     *
     * @ORM\Column(name="ACT_LSR_LIEU", type="string", length=100, nullable=true)
     */
    private $actLsrLieu;

    /**
     * @var float
     *
     * @ORM\Column(name="ACT_LSR_PRIX", type="float", precision=10, scale=0, nullable=true)
     */
    private $actLsrPrix;

    /**
     * @return int
     */
    public function getActId()
    {
        return $this->actId;
    }

    /**
     * @param int $actId
     */
    public function setActId($actId)
    {
        $this->actId = $actId;
    }

    /**
     * @return string
     */
    public function getActIntitule()
    {
        return $this->actIntitule;
    }

    /**
     * @param string $actIntitule
     */
    public function setActIntitule($actIntitule)
    {
        $this->actIntitule = $actIntitule;
    }

    /**
     * @return \DateTime
     */
    public function getActLieu()
    {
        return $this->actLieu;
    }

    /**
     * @param \DateTime $actLieu
     */
    public function setActLieu($actLieu)
    {
        $this->actLieu = $actLieu;
    }

    /**
     * @return string
     */
    public function getActDescription()
    {
        return $this->actDescription;
    }

    /**
     * @param string $actDescription
     */
    public function setActDescription($actDescription)
    {
        $this->actDescription = $actDescription;
    }

    /**
     * @return string
     */
    public function getActSupMultimedia()
    {
        return $this->actSupMultimedia;
    }

    /**
     * @param string $actSupMultimedia
     */
    public function setActSupMultimedia($actSupMultimedia)
    {
        $this->actSupMultimedia = $actSupMultimedia;
    }

    /**
     * @return \DateTime
     */
    public function getActDateDeb()
    {
        return $this->actDateDeb;
    }

    /**
     * @param \DateTime $actDateDeb
     */
    public function setActDateDeb($actDateDeb)
    {
        $this->actDateDeb = $actDateDeb;
    }

    /**
     * @return \DateTime
     */
    public function getActDateFin()
    {
        return $this->actDateFin;
    }

    /**
     * @param \DateTime $actDateFin
     */
    public function setActDateFin($actDateFin)
    {
        $this->actDateFin = $actDateFin;
    }

    /**
     * @return \DateTime
     */
    public function getActHeureDeb()
    {
        return $this->actHeureDeb;
    }

    /**
     * @param \DateTime $actHeureDeb
     */
    public function setActHeureDeb($actHeureDeb)
    {
        $this->actHeureDeb = $actHeureDeb;
    }

    /**
     * @return \DateTime
     */
    public function getActHeureFin()
    {
        return $this->actHeureFin;
    }

    /**
     * @param \DateTime $actHeureFin
     */
    public function setActHeureFin($actHeureFin)
    {
        $this->actHeureFin = $actHeureFin;
    }

    /**
     * @return string
     */
    public function getActType()
    {
        return $this->actType;
    }

    /**
     * @param string $actType
     */
    public function setActType($actType)
    {
        $this->actType = $actType;
    }

    /**
     * @return float
     */
    public function getActChMontant()
    {
        return $this->actChMontant;
    }

    /**
     * @param float $actChMontant
     */
    public function setActChMontant($actChMontant)
    {
        $this->actChMontant = $actChMontant;
    }

    /**
     * @return int
     */
    public function getActChMntAcq()
    {
        return $this->actChMntAcq;
    }

    /**
     * @param int $actChMntAcq
     */
    public function setActChMntAcq($actChMntAcq)
    {
        $this->actChMntAcq = $actChMntAcq;
    }

    /**
     * @return string
     */
    public function getActLsrLieu()
    {
        return $this->actLsrLieu;
    }

    /**
     * @param string $actLsrLieu
     */
    public function setActLsrLieu($actLsrLieu)
    {
        $this->actLsrLieu = $actLsrLieu;
    }

    /**
     * @return float
     */
    public function getActLsrPrix()
    {
        return $this->actLsrPrix;
    }

    /**
     * @param float $actLsrPrix
     */
    public function setActLsrPrix($actLsrPrix)
    {
        $this->actLsrPrix = $actLsrPrix;
    }
    public function __construct($actType)
    {
        $this->actType = $actType;
    }

}

