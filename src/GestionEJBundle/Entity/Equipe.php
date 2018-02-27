<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="GestionEJBundle\Repository\EquipeRepository")
 */
class Equipe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDEquipe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idequipe;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Capital", type="string", length=255, nullable=false)
     */
    private $capital;

    /**
     * @var integer
     *
     * @ORM\Column(name="Participations", type="integer", nullable=false)
     */
    private $participations;

    /**
     * @var string
     *
     * @ORM\Column(name="Continent", type="string", length=255, nullable=false)
     */
    private $continent;

    /**
     * @var integer
     *
     * @ORM\Column(name="Victoires", type="integer", nullable=false)
     */
    private $victoires;

    /**
     * @var string
     *
     * @ORM\Column(name="Entraineur", type="string", length=255, nullable=false)
     */
    private $entraineur;

    /**
     * @var integer
     *
     * @ORM\Column(name="ClassementFifa", type="integer", nullable=false)
     */
    private $classementfifa;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchesCM", type="integer", nullable=false)
     */
    private $matchescm;

    /**
     * @var integer
     *
     * @ORM\Column(name="ButsCM", type="integer", nullable=false)
     */
    private $butscm;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchWins", type="integer", nullable=false)
     */
    private $matchwins;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchLosses", type="integer", nullable=false)
     */
    private $matchlosses;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchDraws", type="integer", nullable=false)
     */
    private $matchdraws;

    /**
     * @var string
     *
     * @ORM\Column(name="Drapeau", type="string", length=255, nullable=false)
     */
    private $drapeau;

    /**
     * @var string
     *
     * @ORM\Column(name="PhotoEquipe", type="string", length=255, nullable=false)
     */
    private $photoequipe;
    /**
     * @var string
     *
     * @ORM\Column(name="LogoFederation", type="string", length=255, nullable=false)
     */
    private $Logo;
    /**
     * @var string
     *
     * @ORM\Column(name="Groupe", type="string", length=1, nullable=false)
     */
    private $Groupe;

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
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=15500, nullable=false)
     */
    private $Description;
    /**
 * @var integer
 *
 * @ORM\Column(name="nbr_points", type="integer", nullable=true)
 */
    private $nbr_points;
    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_buts", type="integer", nullable=true)
     */
    private $nbr_buts;
    /**
     * @return int
     */
    public function getIdequipe()
    {
        return $this->idequipe;
    }

    /**
     * @return int
     */
    public function getNbrPoints()
    {
        return $this->nbr_points;
    }

    /**
     * @param int $nbr_points
     */
    public function setNbrPoints($nbr_points)
    {
        $this->nbr_points = $nbr_points;
    }

    /**
     * @return int
     */
    public function getNbrButs()
    {
        return $this->nbr_buts;
    }

    /**
     * @param int $nbr_buts
     */
    public function setNbrButs($nbr_buts)
    {
        $this->nbr_buts = $nbr_buts;
    }


    /**
     * @param int $idequipe
     * @return Equipe
     */
    public function setIdequipe($idequipe)
    {
        $this->idequipe = $idequipe;
        return $this;
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
     * @return Equipe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param string $capital
     * @return Equipe
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
        return $this;
    }

    /**
     * @return int
     */
    public function getParticipations()
    {
        return $this->participations;
    }

    /**
     * @param int $participations
     * @return Equipe
     */
    public function setParticipations($participations)
    {
        $this->participations = $participations;
        return $this;
    }

    /**
     * @return string
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * @param string $continent
     * @return Equipe
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;
        return $this;
    }

    /**
     * @return int
     */
    public function getVictoires()
    {
        return $this->victoires;
    }

    /**
     * @param int $victoires
     * @return Equipe
     */
    public function setVictoires($victoires)
    {
        $this->victoires = $victoires;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntraineur()
    {
        return $this->entraineur;
    }

    /**
     * @param string $entraineur
     * @return Equipe
     */
    public function setEntraineur($entraineur)
    {
        $this->entraineur = $entraineur;
        return $this;
    }

    /**
     * @return int
     */
    public function getClassementfifa()
    {
        return $this->classementfifa;
    }

    /**
     * @param int $classementfifa
     * @return Equipe
     */
    public function setClassementfifa($classementfifa)
    {
        $this->classementfifa = $classementfifa;
        return $this;
    }

    /**
     * @return int
     */
    public function getMatchescm()
    {
        return $this->matchescm;
    }

    /**
     * @param int $matchescm
     * @return Equipe
     */
    public function setMatchescm($matchescm)
    {
        $this->matchescm = $matchescm;
        return $this;
    }

    /**
     * @return int
     */
    public function getButscm()
    {
        return $this->butscm;
    }

    /**
     * @param int $butscm
     * @return Equipe
     */
    public function setButscm($butscm)
    {
        $this->butscm = $butscm;
        return $this;
    }

    /**
     * @return int
     */
    public function getMatchwins()
    {
        return $this->matchwins;
    }

    /**
     * @param int $matchwins
     * @return Equipe
     */
    public function setMatchwins($matchwins)
    {
        $this->matchwins = $matchwins;
        return $this;
    }

    /**
     * @return int
     */
    public function getMatchlosses()
    {
        return $this->matchlosses;
    }

    /**
     * @param int $matchlosses
     * @return Equipe
     */
    public function setMatchlosses($matchlosses)
    {
        $this->matchlosses = $matchlosses;
        return $this;
    }

    /**
     * @return int
     */
    public function getMatchdraws()
    {
        return $this->matchdraws;
    }

    /**
     * @param int $matchdraws
     * @return Equipe
     */
    public function setMatchdraws($matchdraws)
    {
        $this->matchdraws = $matchdraws;
        return $this;
    }

    /**
     * @return string
     */
    public function getDrapeau()
    {
        return $this->drapeau;
    }

    /**
     * @param string $drapeau
     * @return Equipe
     */
    public function setDrapeau($drapeau)
    {
        $this->drapeau = $drapeau;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoequipe()
    {
        return $this->photoequipe;
    }

    /**
     * @param string $photoequipe
     * @return Equipe
     */
    public function setPhotoequipe($photoequipe)
    {
        $this->photoequipe = $photoequipe;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->Logo;
    }

    /**
     * @param string $Logo
     */
    public function setLogo($Logo)
    {
        $this->Logo = $Logo;
    }

    /**
     * @return string
     */
    public function getGroupe()
    {
        return $this->Groupe;
    }

    /**
     * @param string $Groupe
     */
    public function setGroupe($Groupe)
    {
        $this->Groupe = $Groupe;
    }


}

