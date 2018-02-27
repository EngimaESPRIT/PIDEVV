<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
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


}

