<?php

namespace GestionCommoditeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * GalerieCommodite
 *
 * @ORM\Table(name="galerie_commodite", indexes={@ORM\Index(name="fk_galerie_comm", columns={"id_commodite"})})
 * @ORM\Entity(repositoryClass="GestionCommoditeBundle\Repository\GalerieCommoditeRepository")
 */

class GalerieCommodite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_galerie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGalerie;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     * @Assert\NotBlank(message="Please, upload the image of driving Licence.")
     *
     */
    private $name;
    /**
     * @var \Commodite
     *
     * @ORM\ManyToOne(targetEntity="Commodite")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_commodite", referencedColumnName="id_commodite",onDelete="CASCADE")
     * })
     */
    private $idCommodite;

    /**
     * @return int
     */
    public function getIdGalerie()
    {
        return $this->idGalerie;
    }

    /**
     * @param int $idGalerie
     */
    public function setIdGalerie($idGalerie)
    {
        $this->idGalerie = $idGalerie;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \Commodite
     */
    public function getIdCommodite()
    {
        return $this->idCommodite;
    }

    /**
     * @param \Commodite $idCommodite
     */
    public function setIdCommodite($idCommodite)
    {
        $this->idCommodite = $idCommodite;
    }
}

