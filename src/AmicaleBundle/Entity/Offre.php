<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="OFR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ofrId;

    /**
     * @var string
     *
     * @ORM\Column(name="OFR_INTITULE", type="string", length=50, nullable=false)
     */

    private $ofrIntitule;

    /**
     * @var integer
     *
     * @ORM\Column(name="OFR_NBR_PLACES", type="integer", nullable=false)
     * @Assert\Length(
     *      min = 2,
     *      max = 500,
     *      minMessage = "Le nombre de places doit étre supérieur à {{ limit }} ",
     *      maxMessage = "Le nombre de places doit étre inférieur à  {{ limit }}"
     * )
     * @Assert\GreaterThan(
     *     value="0",
     *      message="Le nombre de places doit étre strictement positif")
     */
    private $ofrNbrPlaces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OFR_DATE_DEB", type="date", nullable=false)
     * @Assert\GreaterThan(
     *      value="today",
     *      message=" Date dépassée")
     */
    private $ofrDateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OFR_DATE_FIN", type="date", nullable=false)
     * @Assert\Expression(
     *     "this.getOfrDateDeb() <= this.getOfrDateFin()",
     *     message="Date fin inférieur à date début")
     */
    private $ofrDateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="OFR_DESCRIPTION", type="text", length=65535, nullable=true)
     */
    private $ofrDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="OFR_AGENCE", type="string", length=50, nullable=true)
     */
    private $ofrAgence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OFR_HEURE_DEB", type="time", nullable=true)
     */
    private $ofrHeureDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OFR_HEURE_FIN", type="time", nullable=true)
     */
    private $ofrHeureFin;

    /**
     * @return int
     */
    public function getOfrId()
    {
        return $this->ofrId;
    }

    /**
     * @param int $ofrId
     */
    public function setOfrId($ofrId)
    {
        $this->ofrId = $ofrId;
    }

    /**
     * @return string
     */
    public function getOfrIntitule()
    {
        return $this->ofrIntitule;
    }

    /**
     * @param string $ofrIntitule
     */
    public function setOfrIntitule($ofrIntitule)
    {
        $this->ofrIntitule = $ofrIntitule;
    }

    /**
     * @return int
     */
    public function getOfrNbrPlaces()
    {
        return $this->ofrNbrPlaces;
    }

    /**
     * @param int $ofrNbrPlaces
     */
    public function setOfrNbrPlaces($ofrNbrPlaces)
    {
        $this->ofrNbrPlaces = $ofrNbrPlaces;
    }

    /**
     * @return \DateTime
     */
    public function getOfrDateDeb()
    {
        return $this->ofrDateDeb;
    }

    /**
     * @param \DateTime $ofrDateDeb
     */
    public function setOfrDateDeb($ofrDateDeb)
    {
        $this->ofrDateDeb = $ofrDateDeb;
    }

    /**
     * @return \DateTime
     */
    public function getOfrDateFin()
    {
        return $this->ofrDateFin;
    }

    /**
     * @param \DateTime $ofrDateFin
     */
    public function setOfrDateFin($ofrDateFin)
    {
        $this->ofrDateFin = $ofrDateFin;
    }

    /**
     * @return string
     */
    public function getOfrDescription()
    {
        return $this->ofrDescription;
    }

    /**
     * @param string $ofrDescription
     */
    public function setOfrDescription($ofrDescription)
    {
        $this->ofrDescription = $ofrDescription;
    }

    /**
     * @return string
     */
    public function getOfrAgence()
    {
        return $this->ofrAgence;
    }

    /**
     * @param string $ofrAgence
     */
    public function setOfrAgence($ofrAgence)
    {
        $this->ofrAgence = $ofrAgence;
    }

    /**
     * @return \DateTime
     */
    public function getOfrHeureDeb()
    {
        return $this->ofrHeureDeb;
    }

    /**
     * @param \DateTime $ofrHeureDeb
     */
    public function setOfrHeureDeb($ofrHeureDeb)
    {
        $this->ofrHeureDeb = $ofrHeureDeb;
    }

    /**
     * @return \DateTime
     */
    public function getOfrHeureFin()
    {
        return $this->ofrHeureFin;
    }

    /**
     * @param \DateTime $ofrHeureFin
     */
    public function setOfrHeureFin($ofrHeureFin)
    {
        $this->ofrHeureFin = $ofrHeureFin;
    }

    function __toString()
    {
        return (String) $this->getOfrNbrPlaces();
    }


}

