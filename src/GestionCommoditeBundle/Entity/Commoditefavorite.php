<?php

namespace GestionCommoditeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commoditefavorite
 *
 * @ORM\Table(name="commoditefavorite", indexes={@ORM\Index(name="fk_favourite_comm", columns={"id_commodite"}), @ORM\Index(name="fk_favourite_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Commoditefavorite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_favorite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFavorite;

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
     * @var \Commodite
     *
     * @ORM\ManyToOne(targetEntity="GestionCommoditeBundle\Entity\Commodite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commodite", referencedColumnName="id_commodite",onDelete="CASCADE")
     * })
     */
    private $idCommodite;

    /**
     * @return int
     */
    public function getIdFavorite()
    {
        return $this->idFavorite;
    }

    /**
     * @param int $idFavorite
     */
    public function setIdFavorite($idFavorite)
    {
        $this->idFavorite = $idFavorite;
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

