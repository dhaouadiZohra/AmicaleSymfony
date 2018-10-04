<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="FK_PUB_SEC_ID", columns={"PUB_SEC_ID"})})
 * @ORM\Entity
 */
class Publication
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PUB_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pubId;

    /**
     * @var string
     *
     * @ORM\Column(name="PUB_TITRE", type="string", length=50, nullable=false)
     */
    private $pubTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="PUB_OBJET", type="string", length=100, nullable=false)
     */
    private $pubObjet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PUB_DATE", type="datetime", nullable=true)
     */
    private $pubDate;


    /**
     * @var string
     *
     * @ORM\Column(name="PUB_DESCRIPTION", type="text", length=65535, nullable=true)
     */
    private $pubDescription;

    /**
     * @var integer
     *
     *   @ORM\Column(name="PUB_SEC_ID", type="integer", length=100, nullable=true)
     *
     */
    private $pubSecId;


    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="PUB_USR_ID", referencedColumnName="id")
     */
    private $pubUsrId;

    /**
     * @return int
     */
    public function getPubId()
    {
        return $this->pubId;
    }

    /**
     * @param int $pubId
     */
    public function setPubId($pubId)
    {
        $this->pubId = $pubId;
    }

    /**
     * @return string
     */
    public function getPubTitre()
    {
        return $this->pubTitre;
    }

    /**
     * @param string $pubTitre
     */
    public function setPubTitre($pubTitre)
    {
        $this->pubTitre = $pubTitre;
    }

    /**
     * @return string
     */
    public function getPubObjet()
    {
        return $this->pubObjet;
    }

    /**
     * @param string $pubObjet
     */
    public function setPubObjet($pubObjet)
    {
        $this->pubObjet = $pubObjet;
    }

    /**
     * @return \DateTime
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }

    /**
     * @param \DateTime $pubDate
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;
    }

    /**
     * @return string
     */
    public function getPubDescription()
    {
        return $this->pubDescription;
    }

    /**
     * @param string $pubDescription
     */
    public function setPubDescription($pubDescription)
    {
        $this->pubDescription = $pubDescription;
    }

    /**
     * @return int
     */
    public function getPubSecId()
    {
        return $this->pubSecId;
    }

    /**
     * @param int $pubSecId
     */
    public function setPubSecId($pubSecId)
    {
        $this->pubSecId = $pubSecId;
    }

    /**
     * @return \FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getPubUsrId()
    {
        return $this->pubUsrId;
    }

    /**
     * @param mixed $pubUsrId
     */
    public function setPubUsrId($pubUsrId)
    {
        $this->pubUsrId = $pubUsrId;
    }







}

