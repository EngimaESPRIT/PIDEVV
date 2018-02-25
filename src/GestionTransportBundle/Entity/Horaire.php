<?php

namespace GestionTransportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horaire
 *
 * @ORM\Table(name="horaire", indexes={@ORM\Index(name="fk_transport", columns={"id_transport"})})
 * @ORM\Entity
 */
class Horaire
{


    /**
     * @var integer
     *
     * @ORM\Column(name="id_horaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHoraire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_match", type="date", nullable=false)
     */
    private $dateMatch;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_depart", type="time", nullable=false)
     */
    private $heureDepart;



    /**
     * @var string
     *
     * @ORM\Column(name="point_depart", type="string", length=255, nullable=false)
     */
    private $pointDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="point_arrive", type="string", length=255, nullable=false)
     */
    private $pointArrive;


    /**
     * @var \Transport
     *
     * @ORM\ManyToOne(targetEntity="GestionTransportBundle\Entity\Transport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_transport", referencedColumnName="id_transport",onDelete="CASCADE")
     * })
     */
    private $idTransport;


    /**
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer", nullable=false)
     */
    private $capacite;

    /**
     * @return int
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param int $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    }








    /**
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }



    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */

    private $prix;



    /**
     * @return int
     */
    public function getIdHoraire()
    {
        return $this->idHoraire;
    }

    /**
     * @param int $idHoraire
     */
    public function setIdHoraire($idHoraire)
    {
        $this->idHoraire = $idHoraire;
    }

    /**
     * @return \DateTime
     */
    public function getDateMatch()
    {
        return $this->dateMatch;
    }

    /**
     * @param \DateTime $dateMatch
     */
    public function setDateMatch($dateMatch)
    {
        $this->dateMatch = $dateMatch;
    }

    /**
     * @return \DateTime
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * @param \DateTime $heureDepart
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;
    }



    /**
     * @return string
     */
    public function getPointDepart()
    {
        return $this->pointDepart;
    }

    /**
     * @param string $pointDepart
     */
    public function setPointDepart($pointDepart)
    {
        $this->pointDepart = $pointDepart;
    }

    /**
     * @return string
     */
    public function getPointArrive()
    {
        return $this->pointArrive;
    }

    /**
     * @param string $pointArrive
     */
    public function setPointArrive($pointArrive)
    {
        $this->pointArrive = $pointArrive;
    }



    /**
     * @return \Transport
     */
    public function getIdTransport()
    {
        return $this->idTransport;
    }

    /**
     * @param \Transport $idTransport
     */
    public function setIdTransport($idTransport)
    {
        $this->idTransport = $idTransport;
    }




}

