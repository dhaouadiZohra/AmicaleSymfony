<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre", indexes={@ORM\Index(name="FK_MBR_AMCL_ID", columns={"MBR_AMCL_ID"})})
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MBR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mbrId;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_NOM", type="string", length=255, nullable=false)
     */
    private $mbrNom;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_PRENOM", type="string", length=255, nullable=false)
     */
    private $mbrPrenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MBR_DATE_NAISSANCE", type="date", nullable=true)
     */
    private $mbrDateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_PROFFESSION", type="string", length=255, nullable=false)
     */
    private $mbrProffession;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_ADRESSE", type="string", length=255, nullable=false)
     */
    private $mbrAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_CIVILITE", type="string", length=255, nullable=false)
     */
    private $mbrCivilite;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_MAIL", type="string", length=255, nullable=false)
     */
    private $mbrMail;

    /**
     * @var integer
     *
     * @ORM\Column(name="MBR_TEL", type="integer", nullable=false)
     */
    private $mbrTel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="MBR_NOTIF", type="boolean", nullable=true)
     */
    private $mbrNotif = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_SEXE", type="string", length=255, nullable=true)
     */
    private $mbrSexe;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_LOGIN", type="string", length=255, nullable=true)
     */
    private $mbrLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="MBR_MPASS", type="string", length=255, nullable=true)
     */
    private $mbrMpass;

    /**
     * @var integer
     *
     * @ORM\Column(name="MBR_AMCL_ID", type="integer", nullable=true)
     */
    private $mbrAmclId;


}

