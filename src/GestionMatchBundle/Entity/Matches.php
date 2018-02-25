<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matches
 *
 * @ORM\Table(name="matches", indexes={@ORM\Index(name="fk_equipa", columns={"EquipeA"}), @ORM\Index(name="fk_groupe", columns={"Id_groupe"}), @ORM\Index(name="fk_equipeb", columns={"EquipeB"}), @ORM\Index(name="fk_stade", columns={"id_stade"})})
 * @ORM\Entity
 */
class Matches
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Match", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatch;

    /**
     * @var string
     *
     * @ORM\Column(name="Phase", type="string", length=20, nullable=false)
     */
    private $phase;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Match", type="date", nullable=false)
     */
    private $dateMatch;

    /**
     * @var string
     *
     * @ORM\Column(name="Lieu_Match", type="string", length=20, nullable=false)
     */
    private $lieuMatch;

    /**
     * @var string
     *
     * @ORM\Column(name="Resultat", type="string", length=20, nullable=false)
     */
    private $resultat;

    /**
     * @var integer
     *
     * @ORM\Column(name="butequipe1", type="integer", nullable=false)
     */
    private $butequipe1;

    /**
     * @var integer
     *
     * @ORM\Column(name="butesuipe2", type="integer", nullable=false)
     */
    private $butesuipe2;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="GestionEJBundle\Entity\Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EquipeA", referencedColumnName="IDEquipe")
     * })
     */
    private $equipea;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="GestionEJBundle\Entity\Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EquipeB", referencedColumnName="IDEquipe")
     * })
     */
    private $equipeb;

    /**
     * @var \Groupe
     *
     * @ORM\ManyToOne(targetEntity="GestionMatchBundle\Entity\Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_groupe", referencedColumnName="Nom_Groupe")
     * })
     */
    private $idGroupe;

    /**
     * @var \Stade
     *
     * @ORM\ManyToOne(targetEntity="GestionEJBundle\Entity\Stade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_stade", referencedColumnName="ID_Stade")
     * })
     */
    private $idStade;

    /**
     * @return int
     */
    public function getIdMatch()
    {
        return $this->idMatch;
    }

    /**
     * @param int $idMatch
     */
    public function setIdMatch($idMatch)
    {
        $this->idMatch = $idMatch;
    }

    /**
     * @return string
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @param string $phase
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
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
     * @return string
     */
    public function getLieuMatch()
    {
        return $this->lieuMatch;
    }

    /**
     * @param string $lieuMatch
     */
    public function setLieuMatch($lieuMatch)
    {
        $this->lieuMatch = $lieuMatch;
    }

    /**
     * @return string
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * @param string $resultat
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    }

    /**
     * @return int
     */
    public function getButequipe1()
    {
        return $this->butequipe1;
    }

    /**
     * @param int $butequipe1
     */
    public function setButequipe1($butequipe1)
    {
        $this->butequipe1 = $butequipe1;
    }

    /**
     * @return int
     */
    public function getButesuipe2()
    {
        return $this->butesuipe2;
    }

    /**
     * @param int $butesuipe2
     */
    public function setButesuipe2($butesuipe2)
    {
        $this->butesuipe2 = $butesuipe2;
    }

    /**
     * @return \Equipe
     */
    public function getEquipea()
    {
        return $this->equipea;
    }

    /**
     * @param \Equipe $equipea
     */
    public function setEquipea($equipea)
    {
        $this->equipea = $equipea;
    }

    /**
     * @return \Equipe
     */
    public function getEquipeb()
    {
        return $this->equipeb;
    }

    /**
     * @param \Equipe $equipeb
     */
    public function setEquipeb($equipeb)
    {
        $this->equipeb = $equipeb;
    }

    /**
     * @return \Groupe
     */
    public function getIdGroupe()
    {
        return $this->idGroupe;
    }

    /**
     * @param \Groupe $idGroupe
     */
    public function setIdGroupe($idGroupe)
    {
        $this->idGroupe = $idGroupe;
    }

    /**
     * @return \Stade
     */
    public function getIdStade()
    {
        return $this->idStade;
    }

    /**
     * @param \Stade $idStade
     */
    public function setIdStade($idStade)
    {
        $this->idStade = $idStade;
    }


}

