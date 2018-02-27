<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stade
 *
 * @ORM\Table(name="stade")
 * @ORM\Entity(repositoryClass="GestionEJBundle\Repository\StadeRepository")
 */
class Stade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Stade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStade;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="capacite", type="string", length=255, nullable=false)
     */
    private $capacite;



    /**
     * @var string
     *
     * @ORM\Column(name="Photostade", type="string", length=255, nullable=false)
     */
    private $photostade;
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=1000, nullable=false)
     */
    private $Description;
    /**
     * @var string
     *
     * @ORM\Column(name="Wifi", type="string", length=1000, nullable=false)
     */
    private $wifi;
    /**
     * @var string
     *
     * @ORM\Column(name="Toit", type="string", length=1000, nullable=false)
     */
    private $Toit;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=1000, nullable=false)
     */
    private $Adresse;
    /**
     * @var string
     *
     * @ORM\Column(name="Surface", type="string", length=1000, nullable=false)
     */
    private $Surface;

    /**
     * @return string
     */
    public function getSurface()
    {
        return $this->Surface;
    }

    /**
     * @param string $Surface
     */
    public function setSurface($Surface)
    {
        $this->Surface = $Surface;
    }


    /**
     * @return string
     */
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * @param string $wifi
     */
    public function setWifi($wifi)
    {
        $this->wifi = $wifi;
    }

    /**
     * @return string
     */
    public function getToit()
    {
        return $this->Toit;
    }

    /**
     * @param string $Toit
     */
    public function setToit($Toit)
    {
        $this->Toit = $Toit;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->Adresse;
    }

    /**
     * @param string $Adresse
     */
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
    }

    /**
     * @return int
     */

    public function getIdStade()
    {
        return $this->idStade;
    }

    /**
     * @param int $idStade
     */
    public function setIdStade($idStade)
    {
        $this->idStade = $idStade;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param string $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getPhotostade()
    {
        return $this->photostade;
    }

    /**
     * @param string $photostade
     */
    public function setPhotostade($photostade)
    {
        $this->photostade = $photostade;
    }

}

