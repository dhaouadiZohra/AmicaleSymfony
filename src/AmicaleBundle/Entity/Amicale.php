<?php

namespace AmicaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amicale
 *
 * @ORM\Table(name="amicale")
 * @ORM\Entity
 */
class Amicale
{
    /**
     * @var integer
     *
     * @ORM\Column(name="AMCL_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $amclId;

    /**
     * @var string
     *
     * @ORM\Column(name="AMCL_ADRESSE", type="string", length=255, nullable=false)
     */
    private $amclAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="AMCL_CODE_POST", type="string", length=255, nullable=false)
     */
    private $amclCodePost;

    /**
     * @var integer
     *
     * @ORM\Column(name="AMCL_TEL", type="integer", nullable=false)
     */
    private $amclTel;

    /**
     * @var string
     *
     * @ORM\Column(name="AMCL_SITEWEB", type="string", length=255, nullable=false)
     */
    private $amclSiteweb;

    /**
     * @var string
     *
     * @ORM\Column(name="AMCL_PRESIDENT", type="string", length=255, nullable=false)
     */
    private $amclPresident;


}

