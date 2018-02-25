<?php

namespace GestionCommoditeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commodite
 *
 * @ORM\Table(name="commodite")
 * @ORM\Entity(repositoryClass="GestionCommoditeBundle\Repository\CommoditeRepository")
 */
class Commodite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commodite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommodite;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=false)
     */
    private $categorie;
    /**
     * @var string
     *
     * @ORM\Column(name="nomCommodite", type="string", length=255, nullable=false)
     */
    private $nomCommodite;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="bigint", nullable=false)
     */
    private $tel;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="carte_credit", type="boolean", nullable=false)
     */
    private $carteCredit;
    /**
     * @var boolean
     *
     * @ORM\Column(name="alcool", type="boolean", nullable=false)
     */
    private $alcool;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ticket_resto", type="boolean", nullable=false)
     */
    private $ticketRestaurant;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wifi_gratuit", type="boolean", nullable=false)
     */
    private $wifiGratuit;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=6000, nullable=false)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;
    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=true)
     */

    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var float
     *
     * @ORM\Column(name="lng", type="float", precision=10, scale=0, nullable=true)
     */
    private $lng;
    /**
     * @ORM\OneToMany(targetEntity="GalerieCommodite", mappedBy="idCommodite")
     */
    private $images;
    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="GestionCommoditeBundle\Entity\Like", mappedBy="commodite")
     */
    private $likes;

    private $moy;

    private $nbLikes;

    /**
     * @return mixed
     */
    public function getNbLikes()
    {
        return $this->nbLikes;
    }

    /**
     * @param mixed $nbLikes
     */
    public function setNbLikes($nbLikes)
    {
        $this->nbLikes = $nbLikes;
    }

    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getMoy()
    {
        return $this->moy;
    }

    /**
     * @param mixed $moy
     */
    public function setMoy($moy)
    {
        $this->moy = $moy;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }


    /**
     * @return int
     */
    public function getIdCommodite()
    {
        return $this->idCommodite;
    }

    /**
     * @param int $idCommodite
     */
    public function setIdCommodite($idCommodite)
    {
        $this->idCommodite = $idCommodite;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return string
     */
    public function getNomCommodite()
    {
        return $this->nomCommodite;
    }

    /**
     * @param string $nomCommodite
     */
    public function setNomCommodite($nomCommodite)
    {
        $this->nomCommodite = $nomCommodite;
    }

    /**
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isCarteCredit()
    {
        return $this->carteCredit;
    }

    /**
     * @param bool $carteCredit
     */
    public function setCarteCredit($carteCredit)
    {
        $this->carteCredit = $carteCredit;
    }

    /**
     * @return bool
     */
    public function isAlcool()
    {
        return $this->alcool;
    }

    /**
     * @param bool $alcool
     */
    public function setAlcool($alcool)
    {
        $this->alcool = $alcool;
    }

    /**
     * @return bool
     */
    public function isTicketRestaurant()
    {
        return $this->ticketRestaurant;
    }

    /**
     * @param bool $ticketRestaurant
     */
    public function setTicketRestaurant($ticketRestaurant)
    {
        $this->ticketRestaurant = $ticketRestaurant;
    }

    /**
     * @return bool
     */
    public function isWifiGratuit()
    {
        return $this->wifiGratuit;
    }

    /**
     * @param bool $wifiGratuit
     */
    public function setWifiGratuit($wifiGratuit)
    {
        $this->wifiGratuit = $wifiGratuit;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
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
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }


}

