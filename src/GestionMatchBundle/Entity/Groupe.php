<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe", indexes={@ORM\Index(name="fk_EquipeA", columns={"EquipeA"}), @ORM\Index(name="fk_EquipeB", columns={"EquipeB"}), @ORM\Index(name="fk_EquipeC", columns={"EquipeC"}), @ORM\Index(name="fk_EquipeD", columns={"EquipeD"})})
 * @ORM\Entity
 */
class Groupe
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Groupe", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nomGroupe;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_A", type="integer", nullable=true)
     */
    private $pointsA;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_B", type="integer", nullable=true)
     */
    private $pointsB;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_C", type="integer", nullable=true)
     */
    private $pointsC;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_D", type="integer", nullable=true)
     */
    private $pointsD;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butA", type="integer", nullable=true)
     */
    private $nbrButa;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butB", type="integer", nullable=true)
     */
    private $nbrButb;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butC", type="integer", nullable=true)
     */
    private $nbrButc;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butD", type="integer", nullable=true)
     */
    private $nbrButd;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_A", type="integer", nullable=true)
     */
    private $wA;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_B", type="integer", nullable=true)
     */
    private $wB;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_C", type="integer", nullable=true)
     */
    private $wC;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_D", type="integer", nullable=true)
     */
    private $wD;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_A", type="integer", nullable=true)
     */
    private $dA;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_B", type="integer", nullable=true)
     */
    private $dB;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_C", type="integer", nullable=true)
     */
    private $dC;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_D", type="integer", nullable=true)
     */
    private $dD;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_A", type="integer", nullable=true)
     */
    private $lA;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_B", type="integer", nullable=true)
     */
    private $lB;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_C", type="integer", nullable=true)
     */
    private $lC;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_D", type="integer", nullable=true)
     */
    private $lD;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="GestionEJBundle\Entity\Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EquipeD", referencedColumnName="IDEquipe")
     * })
     */
    private $equiped;

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
     *   @ORM\JoinColumn(name="EquipeC", referencedColumnName="IDEquipe")
     * })
     */
    private $equipec;

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
     * @return string
     */
    public function getNomGroupe()
    {
        return $this->nomGroupe;
    }

    /**
     * @param string $nomGroupe
     */
    public function setNomGroupe($nomGroupe)
    {
        $this->nomGroupe = $nomGroupe;
    }

    /**
     * @return int
     */
    public function getPointsA()
    {
        return $this->pointsA;
    }

    /**
     * @param int $pointsA
     */
    public function setPointsA($pointsA)
    {
        $this->pointsA = $pointsA;
    }

    /**
     * @return int
     */
    public function getPointsB()
    {
        return $this->pointsB;
    }

    /**
     * @param int $pointsB
     */
    public function setPointsB($pointsB)
    {
        $this->pointsB = $pointsB;
    }

    /**
     * @return int
     */
    public function getPointsC()
    {
        return $this->pointsC;
    }

    /**
     * @param int $pointsC
     */
    public function setPointsC($pointsC)
    {
        $this->pointsC = $pointsC;
    }

    /**
     * @return int
     */
    public function getPointsD()
    {
        return $this->pointsD;
    }

    /**
     * @param int $pointsD
     */
    public function setPointsD($pointsD)
    {
        $this->pointsD = $pointsD;
    }

    /**
     * @return int
     */
    public function getNbrButa()
    {
        return $this->nbrButa;
    }

    /**
     * @param int $nbrButa
     */
    public function setNbrButa($nbrButa)
    {
        $this->nbrButa = $nbrButa;
    }

    /**
     * @return int
     */
    public function getNbrButb()
    {
        return $this->nbrButb;
    }

    /**
     * @param int $nbrButb
     */
    public function setNbrButb($nbrButb)
    {
        $this->nbrButb = $nbrButb;
    }

    /**
     * @return int
     */
    public function getNbrButc()
    {
        return $this->nbrButc;
    }

    /**
     * @param int $nbrButc
     */
    public function setNbrButc($nbrButc)
    {
        $this->nbrButc = $nbrButc;
    }

    /**
     * @return int
     */
    public function getNbrButd()
    {
        return $this->nbrButd;
    }

    /**
     * @param int $nbrButd
     */
    public function setNbrButd($nbrButd)
    {
        $this->nbrButd = $nbrButd;
    }

    /**
     * @return int
     */
    public function getWA()
    {
        return $this->wA;
    }

    /**
     * @param int $wA
     */
    public function setWA($wA)
    {
        $this->wA = $wA;
    }

    /**
     * @return int
     */
    public function getWB()
    {
        return $this->wB;
    }

    /**
     * @param int $wB
     */
    public function setWB($wB)
    {
        $this->wB = $wB;
    }

    /**
     * @return int
     */
    public function getWC()
    {
        return $this->wC;
    }

    /**
     * @param int $wC
     */
    public function setWC($wC)
    {
        $this->wC = $wC;
    }

    /**
     * @return int
     */
    public function getWD()
    {
        return $this->wD;
    }

    /**
     * @param int $wD
     */
    public function setWD($wD)
    {
        $this->wD = $wD;
    }

    /**
     * @return int
     */
    public function getDA()
    {
        return $this->dA;
    }

    /**
     * @param int $dA
     */
    public function setDA($dA)
    {
        $this->dA = $dA;
    }

    /**
     * @return int
     */
    public function getDB()
    {
        return $this->dB;
    }

    /**
     * @param int $dB
     */
    public function setDB($dB)
    {
        $this->dB = $dB;
    }

    /**
     * @return int
     */
    public function getDC()
    {
        return $this->dC;
    }

    /**
     * @param int $dC
     */
    public function setDC($dC)
    {
        $this->dC = $dC;
    }

    /**
     * @return int
     */
    public function getDD()
    {
        return $this->dD;
    }

    /**
     * @param int $dD
     */
    public function setDD($dD)
    {
        $this->dD = $dD;
    }

    /**
     * @return int
     */
    public function getLA()
    {
        return $this->lA;
    }

    /**
     * @param int $lA
     */
    public function setLA($lA)
    {
        $this->lA = $lA;
    }

    /**
     * @return int
     */
    public function getLB()
    {
        return $this->lB;
    }

    /**
     * @param int $lB
     */
    public function setLB($lB)
    {
        $this->lB = $lB;
    }

    /**
     * @return int
     */
    public function getLC()
    {
        return $this->lC;
    }

    /**
     * @param int $lC
     */
    public function setLC($lC)
    {
        $this->lC = $lC;
    }

    /**
     * @return int
     */
    public function getLD()
    {
        return $this->lD;
    }

    /**
     * @param int $lD
     */
    public function setLD($lD)
    {
        $this->lD = $lD;
    }

    /**
     * @return \Equipe
     */
    public function getEquiped()
    {
        return $this->equiped;
    }

    /**
     * @param \Equipe $equiped
     */
    public function setEquiped($equiped)
    {
        $this->equiped = $equiped;
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
    public function getEquipec()
    {
        return $this->equipec;
    }

    /**
     * @param \Equipe $equipec
     */
    public function setEquipec($equipec)
    {
        $this->equipec = $equipec;
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


}

