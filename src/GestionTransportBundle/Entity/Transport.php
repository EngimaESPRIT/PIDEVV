<?php

namespace GestionTransportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transport
 *
 * @ORM\Table(name="transport")
 * @ORM\Entity

 */
class Transport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_transport", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTransport;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;


    /**
     * @var string
     *
     * @ORM\Column(name="station", type="string", length=255, nullable=false)
     */
    private $station;

    /**
     * @return string
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * @param string $station
     */
    public function setStation($station)
    {
        $this->station = $station;
    }



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
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer", nullable=false)
     */
    private $capacite;




    /**
     * @return int
     */
    public function getIdTransport()
    {
        return $this->idTransport;
    }

    /**
     * @param int $idTransport
     */
    public function setIdTransport($idTransport)
    {
        $this->idTransport = $idTransport;
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



}

