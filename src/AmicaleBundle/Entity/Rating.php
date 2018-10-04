<?php
/**
 * Created by PhpStorm.
 * User: Safa
 * Date: 03/04/2017
 * Time: 10:52
 */

namespace AmicaleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating", indexes={@ORM\Index(name="FK_Rate_ID", columns={"Rate_ID"})})
 * @ORM\Entity
 */


class Rating
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Rate_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rateId;

    /**
     *@ORM\Column(name="pub_id",type="integer")
     */
    private $publication;

    /**
     *@ORM\Column(name="user_id",type="integer")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    protected $valeur;

    /**
     * @ORM\Column(name="nbr",type="integer")
     */
    protected $nombre;

    /**
     * @return int
     */
    public function getRateId()
    {
        return $this->rateId;
    }

    /**
     * @param int $rateId
     */
    public function setRateId($rateId)
    {
        $this->rateId = $rateId;
    }

    /**
     * @return mixed
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * @param mixed $publication
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }






    /**
     * @return mixed
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param mixed $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }




}