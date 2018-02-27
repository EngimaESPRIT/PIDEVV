<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pronostics
 *
 * @ORM\Table(name="pronostics", indexes={@ORM\Index(name="fk_id_user", columns={"id_user"}), @ORM\Index(name="fk_match_prono", columns={"Id_Match"})})
 * @ORM\Entity
 */
class Pronostics
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Prono", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProno;

    /**
     * @var string
     *
     * @ORM\Column(name="Choix_Utilisateur", type="string", length=2, nullable=false)
     */
    private $choixUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Staut_paris", type="string", length=20, nullable=true)
     */
    private $stautParis;

    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Matches
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Matches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Match", referencedColumnName="Id_Match")
     * })
     */
    private $idMatch;

    /**
     * @return int
     */
    public function getIdProno()
    {
        return $this->idProno;
    }

    /**
     * @param int $idProno
     */
    public function setIdProno($idProno)
    {
        $this->idProno = $idProno;
    }

    /**
     * @return string
     */
    public function getChoixUtilisateur()
    {
        return $this->choixUtilisateur;
    }

    /**
     * @param string $choixUtilisateur
     */
    public function setChoixUtilisateur($choixUtilisateur)
    {
        $this->choixUtilisateur = $choixUtilisateur;
    }

    /**
     * @return string
     */
    public function getStautParis()
    {
        return $this->stautParis;
    }

    /**
     * @param string $stautParis
     */
    public function setStautParis($stautParis)
    {
        $this->stautParis = $stautParis;
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
     * @return \Matches
     */
    public function getIdMatch()
    {
        return $this->idMatch;
    }

    /**
     * @param \Matches $idMatch
     */
    public function setIdMatch($idMatch)
    {
        $this->idMatch = $idMatch;
    }


}

