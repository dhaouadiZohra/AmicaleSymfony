<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_RES_OFR_ID", columns={"RES_OFR_ID"})})
 * @ORM\Entity
 */


class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="RES_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resId;

    /**
     * @var string
     *
     * @ORM\Column(name="RES_INTITULE", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message = "Le champ intitulé ne doit pas etre vide")
     */
    private $resIntitule;

    /**
     * @var string
     *
     * @ORM\Column(name="RES_LIEU", type="string", length=50, nullable=false)
     */
    private $resLieu;

    /**
     * @var string
     *
     * @ORM\Column(name="RES_DESCRIPTION", type="string", length=200, nullable=false)
     * @Assert\NotBlank()
     */
    private $resDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="RES_NBR_PERSONNES", type="integer", nullable=false)
     */
    private $resNbrPersonnes;

    /**
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumn(name="RES_OFR_ID", referencedColumnName="OFR_ID")
     * @Assert\Expression(
     *     "this.getResOfrId().getOfrNbrPlaces()> this.getResNbrPersonnes()",
     *     message="Nombre de places limité")
     */
        private $resOfrId;

    /**
     * @return int
     */

    public function getResId()
    {
        return $this->resId;
    }

    /**
     * @param int $resId
     */
    public function setResId($resId)
    {
        $this->resId = $resId;
    }

    /**
     * @return string
     */
    public function getResIntitule()
    {
        return $this->resIntitule;
    }

    /**
     * @param string $resIntitule
     */
    public function setResIntitule($resIntitule)
    {
        $this->resIntitule = $resIntitule;
    }

    /**
     * @return string
     */
    public function getResLieu()
    {
        return $this->resLieu;
    }

    /**
     * @param string $resLieu
     */
    public function setResLieu($resLieu)
    {
        $this->resLieu = $resLieu;
    }

    /**
     * @return string
     */
    public function getResDescription()
    {
        return $this->resDescription;
    }

    /**
     * @param string $resDescription
     */
    public function setResDescription($resDescription)
    {
        $this->resDescription = $resDescription;
    }

    /**
     * @return int
     */
    public function getResNbrPersonnes()
    {
        return $this->resNbrPersonnes;
    }

    /**
     * @param int $resNbrPersonnes
     */
    public function setResNbrPersonnes($resNbrPersonnes)
    {
        $this->resNbrPersonnes = $resNbrPersonnes;
    }

    /**
     * @return int
     */
    public function getResOfrId()
    {
        return $this->resOfrId;
    }

    /**
     * @param int $resOfrId
     */
    public function setResOfrId($resOfrId)
    {
        $this->resOfrId = $resOfrId;
    }
/*
    function __toString()
    {
        return $this->resOfrId;
    }
*/

}

