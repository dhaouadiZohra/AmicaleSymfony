<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Section
 * @Package AmicaleBundle\Entity;
 */



/**
 * @ORM\Entity
 */
class Section
{

    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(name="SEC_ID", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="SEC_NOM", type="string", length=255)
     */
    private $nomSec;

    /**
     * @ORM\Column(name="archive", type="boolean")
     */
    private $archive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SEC_DATE", type="datetime", nullable=false)
     */
    private $dateSec;

    /**
     * @return \DateTime
     */
    public function getDateSec()
    {
        return $this->dateSec;
    }

    /**
     * @param \DateTime $dateSec
     */
    public function setDateSec($dateSec)
    {
        $this->dateSec = $dateSec;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomSec()
    {
        return $this->nomSec;
    }

    /**
     * @param mixed $nomSec
     */
    public function setNomSec($nomSec)
    {
        $this->nomSec = $nomSec;
    }

    /**
     * @return mixed
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * @param mixed $archive
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;
    }



}
