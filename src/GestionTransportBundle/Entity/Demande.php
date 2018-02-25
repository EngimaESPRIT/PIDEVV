<?php

namespace GestionTransportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="fk_demande_user", columns={"id_user"}), @ORM\Index(name="fk_vehicules", columns={"id_vehicule"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_places_dispo", type="integer", nullable=false)
     */
    private $nbPlacesDispo;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $idUser;

    /**
     * @var \Vehicules
     *
     * @ORM\ManyToOne(targetEntity="Vehicules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_vehicule", referencedColumnName="id_vehicule",onDelete="CASCADE")
     * })
     */
    private $idVehicule;


    /**
     * @var integer

     * @ORM\Column(name="prix", type="integer", nullable=false)
     */

    private $prix;





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
     * @return int
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param int $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * @return int
     */
    public function getNbPlacesDispo()
    {
        return $this->nbPlacesDispo;
    }

    /**
     * @param int $nbPlacesDispo
     */
    public function setNbPlacesDispo($nbPlacesDispo)
    {
        $this->nbPlacesDispo = $nbPlacesDispo;
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
     * @return \User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \User $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return \Vehicules
     */
    public function getIdVehicule()
    {
        return $this->idVehicule;
    }

    /**
     * @param \Vehicules $idVehicule
     */
    public function setIdVehicule($idVehicule)
    {
        $this->idVehicule = $idVehicule;
    }



}

