<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement", indexes={@ORM\Index(name="FK_ABN_MBR_ID", columns={"ABN_MBR_ID"})})
 * @ORM\Entity
 */
class Abonnement
{
    /*
* @ORM\ManyToOne(targetEntity="Abonnement")
* @ORM\joinColumn(name="Abonnement_id",referencedColumnName="id")
* @ORM\Column(nullable=true)
*/
    /**
     * @return int
     */
    public function getAbnId()
    {
        return $this->abnId;
    }

    /**
     * @param int $abnId
     */
    public function setAbnId($abnId)
    {
        $this->abnId = $abnId;
    }

    /**
     * @return int
     */
    public function getAbnMbrId()
    {
        return $this->abnMbrId;
    }

    /**
     * @param int $abnMbrId
     */
    public function setAbnMbrId($abnMbrId)
    {
        $this->abnMbrId = $abnMbrId;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getAgence()
    {
        return $this->Agence;
    }

    /**
     * @param string $Agence
     */
    public function setAgence($Agence)
    {
        $this->Agence = $Agence;
    }

    /**
     * @return string
     */
    public function getLieux()
    {
        return $this->Lieux;
    }

    /**
     * @param string $Lieux
     */
    public function setLieux($Lieux)
    {
        $this->Lieux = $Lieux;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->Prix;
    }

    /**
     * @param float $Prix
     */
    public function setPrix($Prix)
    {
        $this->Prix = $Prix;
    }

    /**
     * @return string
     */
    public function getAbnDescription()
    {
        return $this->abnDescription;
    }

    /**
     * @param string $abnDescription
     */
    public function setAbnDescription($abnDescription)
    {
        $this->abnDescription = $abnDescription;
    }

    /**
     * @return int
     */
    public function getAbnNbrPlaces()
    {
        return $this->abnNbrPlaces;
    }

    /**
     * @param int $abnNbrPlaces
     */
    public function setAbnNbrPlaces($abnNbrPlaces)
    {
        $this->abnNbrPlaces = $abnNbrPlaces;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeb()
    {
        return $this->DateDeb;
    }

    /**
     * @param \DateTime $DateDeb
     */
    public function setDateDeb($DateDeb)
    {
        $this->DateDeb = $DateDeb;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->DateFin;
    }

    /**
     * @param \DateTime $DateFin
     */
    public function setDateFin($DateFin)
    {
        $this->DateFin = $DateFin;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="ABN_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    private $abnId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ABN_MBR_ID", type="integer", nullable=true)
     */
    private $abnMbrId;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Agence", type="string", nullable=true)
     */
    private $Agence;

    /**
     * @var string
     *
     * @ORM\Column(name="Lieu", type="string", nullable=true)
     */
    private $Lieux;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix", type="float", nullable=false)
     */
    private $Prix;

    /**
     * @var string
     *
     * @ORM\Column(name="ABN_Description", type="string", length=245, nullable=false)
     */
    private $abnDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="ABN_nbr_places", type="integer", nullable=false)
     *
     * @Assert\GreaterThanOrEqual(0)
     */
    private $abnNbrPlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_DEB", type="date", nullable=false)
     *
     * @Assert\GreaterThanOrEqual("today")
     */
    private $DateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_FIN", type="date", nullable=false)
     *
     * @Assert\GreaterThanOrEqual("today")
     */
    private $DateFin;


}

