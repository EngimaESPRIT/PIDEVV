<?php

namespace GestionCommoditeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commodite
 *
 * @ORM\Table(name="jaime")
 * @ORM\Entity()
 */
class Like
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User", inversedBy="likes")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="GestionCommoditeBundle\Entity\Commodite", inversedBy="likes")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="fk_commodite", referencedColumnName="id_commodite",onDelete="CASCADE")})
     */
    private $commodite;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCommodite()
    {
        return $this->commodite;
    }

    /**
     * @param mixed $commodite
     */
    public function setCommodite($commodite)
    {
        $this->commodite = $commodite;
    }


}