<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Galerie
 *
 * @ORM\Table(name="galerie", indexes={@ORM\Index(name="FK_GLR_ADM_ID", columns={"GLR_ADM_ID"})})
 * @ORM\Entity
 */
class Galerie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="GLR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $glrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GLR_DATE", type="date", nullable=false)
     */
    private $glrDate;
    /**
     * @var \String
     * @ORM\Column(name="GLR_IMG", type="string", nullable=false)
     * @Assert\Image()
     */

    private $glrImg;

    /**
     * @var integer
     *
     * @ORM\Column(name="GLR_ADM_ID", type="integer", nullable=true)
     */
    private $glrAdmId;


    /**
     * @var integer
     *
     * @ORM\Column(name="GLR_NBR", type="integer")
     */
    private $glrnbr;

    /**
     * @return int
     */
    public function getGlrnbr()
    {
        return $this->glrnbr;
    }

    /**
     * @param int $glrnbr
     */
    public function setGlrnbr($glrnbr)
    {
        $this->glrnbr = $glrnbr;
    }


    /**
     * Galerie constructor.
     * @param \DateTime $glrDate
     */

    public function __construct()
    {
        $this->glrDate = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getGlrId()
    {
        return $this->glrId;
    }

    /**
     * @param int $glrId
     */
    public function setGlrId($glrId)
    {
        $this->glrId = $glrId;
    }

    /**
     * @return \DateTime
     */
    public function getGlrDate()
    {
        return $this->glrDate;
    }

    /**
     * @param \DateTime $glrDate
     */
    public function setGlrDate($glrDate)
    {
        $this->glrDate = $glrDate;
    }

    /**
     * @return String
     */
    public function getGlrImg()
    {
        return $this->glrImg;
    }

    /**
     * @param String $glrImg
     */
    public function setGlrImg($glrImg)
    {
        $this->glrImg = $glrImg;
    }

    /**
     * @return int
     */
    public function getGlrAdmId()
    {
        return $this->glrAdmId;
    }

    /**
     * @param int $glrAdmId
     */
    public function setGlrAdmId($glrAdmId)
    {
        $this->glrAdmId = $glrAdmId;
    }




}

