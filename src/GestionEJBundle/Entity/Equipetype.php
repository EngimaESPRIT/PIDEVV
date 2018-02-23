<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipetype
 *
 * @ORM\Table(name="equipetype", indexes={@ORM\Index(name="FK_j1", columns={"joueur1"}), @ORM\Index(name="FK_j2", columns={"joueur2"}), @ORM\Index(name="FK_j3", columns={"joueur3"}), @ORM\Index(name="FK_j4", columns={"joueur4"}), @ORM\Index(name="FK_j5", columns={"joueur5"}), @ORM\Index(name="FK_j6", columns={"joueur6"}), @ORM\Index(name="FK_j7", columns={"joueur7"}), @ORM\Index(name="FK_j8", columns={"joueur8"}), @ORM\Index(name="FK_j9", columns={"joueur9"}), @ORM\Index(name="FK_j10", columns={"joueur10"}), @ORM\Index(name="FK_j11", columns={"joueur11"})})
 * @ORM\Entity
 */
class Equipetype
{
    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur1", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur1;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur10", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur10;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur11", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur11;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur2", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur2;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur3", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur3;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur4", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur4;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur5", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur5;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur6", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur6;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur7", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur7;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur8", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur8;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur9", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur9;
    /**
     * @var string
     *
     * @ORM\Column(name="formation", type="string", length=255, nullable=false)
     */
    private $formation;

    /**
     * @return string
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * @param string $formation
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;
    }

    /**
     * @return \User
     */

    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param \User $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur1()
    {
        return $this->joueur1;
    }

    /**
     * @param \Joueur $joueur1
     */
    public function setJoueur1($joueur1)
    {
        $this->joueur1 = $joueur1;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur10()
    {
        return $this->joueur10;
    }

    /**
     * @param \Joueur $joueur10
     */
    public function setJoueur10($joueur10)
    {
        $this->joueur10 = $joueur10;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur11()
    {
        return $this->joueur11;
    }

    /**
     * @param \Joueur $joueur11
     */
    public function setJoueur11($joueur11)
    {
        $this->joueur11 = $joueur11;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur2()
    {
        return $this->joueur2;
    }

    /**
     * @param \Joueur $joueur2
     */
    public function setJoueur2($joueur2)
    {
        $this->joueur2 = $joueur2;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur3()
    {
        return $this->joueur3;
    }

    /**
     * @param \Joueur $joueur3
     */
    public function setJoueur3($joueur3)
    {
        $this->joueur3 = $joueur3;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur4()
    {
        return $this->joueur4;
    }

    /**
     * @param \Joueur $joueur4
     */
    public function setJoueur4($joueur4)
    {
        $this->joueur4 = $joueur4;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur5()
    {
        return $this->joueur5;
    }

    /**
     * @param \Joueur $joueur5
     */
    public function setJoueur5($joueur5)
    {
        $this->joueur5 = $joueur5;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur6()
    {
        return $this->joueur6;
    }

    /**
     * @param \Joueur $joueur6
     */
    public function setJoueur6($joueur6)
    {
        $this->joueur6 = $joueur6;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur7()
    {
        return $this->joueur7;
    }

    /**
     * @param \Joueur $joueur7
     */
    public function setJoueur7($joueur7)
    {
        $this->joueur7 = $joueur7;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur8()
    {
        return $this->joueur8;
    }

    /**
     * @param \Joueur $joueur8
     */
    public function setJoueur8($joueur8)
    {
        $this->joueur8 = $joueur8;
    }

    /**
     * @return \Joueur
     */
    public function getJoueur9()
    {
        return $this->joueur9;
    }

    /**
     * @param \Joueur $joueur9
     */
    public function setJoueur9($joueur9)
    {
        $this->joueur9 = $joueur9;
    }


}

