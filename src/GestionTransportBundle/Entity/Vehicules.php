<?php

namespace GestionTransportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Vehicules
 *
 * @ORM\Table(name="vehicules")
 * @ORM\Entity
 */
class Vehicules
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vehicule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVehicule;

    /**
     * @var string
     *
     * @ORM\Column(name="immatriculation", type="string", length=50, nullable=false)
     */
    private $immatriculation;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=false)
     */
    private $marque;

    /**
     * @return string
     */
    public function getImageCarteGrise()
    {
        return $this->imageCarteGrise;
    }

    /**
     * @param string $imageCarteGrise
     */
    public function setImageCarteGrise($imageCarteGrise)
    {
        $this->imageCarteGrise = $imageCarteGrise;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="image_carte_grise", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Please, upload the image of your driving licence.")
     * @Assert\File(mimeTypes={"image/*"})
     *

     *
     */
    private $imageCarteGrise;

    /**
     * @return string
     */
    public function getImageVehicule()
    {
        return $this->imageVehicule;
    }

    /**
     * @param string $imageVehicule
     */
    public function setImageVehicule($imageVehicule)
    {
        $this->imageVehicule = $imageVehicule;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="image_vehicule", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Please, upload the image of your car.")
     * @Assert\File(mimeTypes={"image/*"})
     *

     *
     */
    private $imageVehicule;

    /**
     * @var string
     *
     * @ORM\Column(name="num_assurance", type="string", nullable=false)
     */
    private $numAssurance;



    /**
     * @var integer
     *
     * @ORM\Column(name="nb_places", type="integer", nullable=false)
     */
    private $nbPlaces;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *@ORM\JoinColumn(name="id_user", referencedColumnName="id",onDelete="CASCADE")
     *
     * })
     */
    private $idUser;

    /**
     * @return int
     */


    public function getIdVehicule()
    {
        return $this->idVehicule;
    }

    /**
     * @param int $idVehicule
     */
    public function setIdVehicule($idVehicule)
    {
        $this->idVehicule = $idVehicule;
    }

    /**
     * @return string
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * @param string $immatriculation
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;
    }

    /**
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param string $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return string
     */


    /**
     * @return int
     */
    public function getNumAssurance()
    {
        return $this->numAssurance;
    }

    /**
     * @param int $numAssurance
     */
    public function setNumAssurance($numAssurance)
    {
        $this->numAssurance = $numAssurance;
    }



    /**
     * @return int
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * @param int $nbPlaces
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;
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






}

