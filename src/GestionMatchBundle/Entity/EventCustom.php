<?php
/**
 * Created by PhpStorm.
 * User: medme
 * Date: 23/02/2018
 * Time: 19:21
 */

namespace GestionMatchBundle\Entity;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpKernel\Bundle\Bundle;


/**
 * @ORM\Entity
 * @ORM\Table(name="CalendarEvent")
 */

abstract class CalendarEvent extends FullCalendarEvent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nom;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }



    // add your own fields

}