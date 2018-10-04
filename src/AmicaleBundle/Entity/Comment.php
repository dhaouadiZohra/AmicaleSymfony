<?php
/**
 * Created by PhpStorm.
 * User: oussa
 * Date: 4/10/2017
 * Time: 3:35 AM
 */

namespace AmicaleBundle\Entity;


class Comment
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrSignale=0;

    /**
     * @return mixed
     */
    public function getNbrSignale()
    {
        return $this->nbrSignale;
    }

    /**
     * @param mixed $nbrSignale
     */
    public function setNbrSignale($nbrSignale)
    {
        $this->nbrSignale = $nbrSignale;
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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param mixed $dateAjout
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @ORM\ManyToOne(targetEntity="HostGuest\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="User_ID")
     */
    private $idUser;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser(User $idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Activite")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idActivite;
    /**
     * @return mixed
     */
    public function getIdActivite()
    {
        return $this->idActivite;
    }

    /**
     * @param mixed $idActivite
     */
    public function setIdActivite(Activite $idActivite)
    {
        $this->idAnnonce = $idActivite;
    }

    public function __construct()
    {
        $this->dateAjout = new \DateTime("now");
    }
}