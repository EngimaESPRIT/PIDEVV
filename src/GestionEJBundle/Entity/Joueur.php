<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur", indexes={@ORM\Index(name="fk_equipe", columns={"ID_Equipe"})})
 * @ORM\Entity(repositoryClass="GestionEJBundle\Repository\JoueurRepository")
 */
class Joueur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDJoueur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idjoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="Numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datedenaissance", type="date", nullable=false)
     */
    private $datedenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="LieuNaissance", type="string", length=255, nullable=false)
     */
    private $lieunaissance;

    /**
     * @var float
     *
     * @ORM\Column(name="Taille", type="float", precision=10, scale=0, nullable=false)
     */
    private $taille;

    /**
     * @var float
     *
     * @ORM\Column(name="Poids", type="float", precision=10, scale=0, nullable=false)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="Nationalite", type="string", length=255, nullable=false)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="Poste1", type="string", length=255, nullable=false)
     */
    private $poste1;



    /**
     * @var integer
     *
     * @ORM\Column(name="Cout", type="integer", nullable=false)
     */
    private $cout;

    /**
     * @var integer
     *
     * @ORM\Column(name="Buts", type="integer", nullable=false)
     */
    private $buts;

    /**
     * @var integer
     *
     * @ORM\Column(name="Selections", type="integer", nullable=false)
     */
    private $selections;

    /**
     * @var integer
     *
     * @ORM\Column(name="Participations", type="integer", nullable=false)
     */
    private $participations;

    /**
     * @var string
     *
     * @ORM\Column(name="Pied", type="string", length=255, nullable=false)
     */
    private $pied;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageJoueur1", type="string", length=255, nullable=false)
     */
    private $imagejoueur1;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageJoueur2", type="string", length=255, nullable=false)
     */
    private $imagejoueur2;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageJoueur3", type="string", length=255, nullable=false)
     */
    private $imagejoueur3;

    /**
     * @var integer
     *
     * @ORM\Column(name="ButsMarque", type="integer", nullable=true)
     */
    private $butsmarque;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Equipe", referencedColumnName="IDEquipe",onDelete="CASCADE")
     * })
     */
    private $idEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=15500, nullable=false)
     */
    private $Description;
    /**
     * @return int
     */

    public function getIdjoueur()
    {
        return $this->idjoueur;
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
     * @param int $idjoueur
     */
    public function setIdjoueur($idjoueur)
    {
        $this->idjoueur = $idjoueur;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
     * @return \DateTime
     */
    public function getDatedenaissance()
    {
        return $this->datedenaissance;
    }

    /**
     * @param \DateTime $datedenaissance
     */
    public function setDatedenaissance($datedenaissance)
    {
        $this->datedenaissance = $datedenaissance;
    }

    /**
     * @return string
     */
    public function getLieunaissance()
    {
        return $this->lieunaissance;
    }

    /**
     * @param string $lieunaissance
     */
    public function setLieunaissance($lieunaissance)
    {
        $this->lieunaissance = $lieunaissance;
    }

    /**
     * @return float
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * @param float $taille
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    /**
     * @return float
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param float $poids
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    /**
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param string $nationalite
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    /**
     * @return string
     */
    public function getPoste1()
    {
        return $this->poste1;
    }

    /**
     * @param string $poste1
     */
    public function setPoste1($poste1)
    {
        $this->poste1 = $poste1;
    }

    /**
     * @return int
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * @param int $cout
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    }

    /**
     * @return int
     */
    public function getButs()
    {
        return $this->buts;
    }

    /**
     * @param int $buts
     */
    public function setButs($buts)
    {
        $this->buts = $buts;
    }

    /**
     * @return int
     */
    public function getSelections()
    {
        return $this->selections;
    }

    /**
     * @param int $selections
     */
    public function setSelections($selections)
    {
        $this->selections = $selections;
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
     */
    public function setParticipations($participations)
    {
        $this->participations = $participations;
    }

    /**
     * @return string
     */
    public function getPied()
    {
        return $this->pied;
    }

    /**
     * @param string $pied
     */
    public function setPied($pied)
    {
        $this->pied = $pied;
    }

    /**
     * @return string
     */
    public function getImagejoueur1()
    {
        return $this->imagejoueur1;
    }

    /**
     * @param string $imagejoueur1
     */
    public function setImagejoueur1($imagejoueur1)
    {
        $this->imagejoueur1 = $imagejoueur1;
    }

    /**
     * @return string
     */
    public function getImagejoueur2()
    {
        return $this->imagejoueur2;
    }

    /**
     * @param string $imagejoueur2
     */
    public function setImagejoueur2($imagejoueur2)
    {
        $this->imagejoueur2 = $imagejoueur2;
    }

    /**
     * @return string
     */
    public function getImagejoueur3()
    {
        return $this->imagejoueur3;
    }

    /**
     * @param string $imagejoueur3
     */
    public function setImagejoueur3($imagejoueur3)
    {
        $this->imagejoueur3 = $imagejoueur3;
    }

    /**
     * @return int
     */
    public function getButsmarque()
    {
        return $this->butsmarque;
    }

    /**
     * @param int $butsmarque
     */
    public function setButsmarque($butsmarque)
    {
        $this->butsmarque = $butsmarque;
    }

    /**
     * @return \Equipe
     */
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * @param \Equipe $idEquipe
     */
    public function setIdEquipe($idEquipe)
    {
        $this->idEquipe = $idEquipe;
    }


}

