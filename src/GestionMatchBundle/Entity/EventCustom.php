<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventcustom
 *
 * @ORM\Table(name="eventcustom")
 * @ORM\Entity
 */
class Eventcustom
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;


}

