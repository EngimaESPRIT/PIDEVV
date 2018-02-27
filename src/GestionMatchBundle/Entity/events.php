<?php


namespace GestionMatchBundle\Entity;



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;




/**
 * @ORM\Entity
 * @ORM\Table(name="events")
 */
class events
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $idevent;

    /**
     * @ORM\Column(type="integer")
     */
    public $enable = 0;

    /**
     * @ORM\Column(type="integer")
     */
    public $NbrPlaceToken = 0;

    /**
     * @return mixed
     */
    public function getNbrPlaceToken()
    {
        return $this->NbrPlaceToken;
    }

    /**
     * @param mixed $NbrPlaceToken
     */
    public function setNbrPlaceToken($NbrPlaceToken)
    {
        $this->NbrPlaceToken = $NbrPlaceToken;
    }

    /**
     * @return mixed
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * @param mixed $enable
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    /**
     * @ORM\Column(type="string",length=255)
     */
    public $title;

    /**
     * @ORM\Column(type="integer")
     */
    public $nbplaces;
    /**
     * One event has Many tickets.
     * @ORM\OneToMany(targetEntity="ticket", mappedBy="event")
     */
    private $tickets;
    /**
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id")
     */
    private $iduser;

    /**
     * @ORM\Column(type="float")
     */
    public $price;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdate",type="datetime")
     */
    public $startdate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate",type="datetime")
     */
    public $enddate;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    /**
     * Get idevent
     *
     * @return integer
     */
    public function getIdevent()
    {
        return $this->idevent;
    }

    public function getId()
    {
        return $this->idevent;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return event
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return event
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return event
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set nbplaces
     *
     * @param integer $nbplaces
     *
     * @return event
     */
    public function setNbplaces($nbplaces)
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    /**
     * Get nbplaces
     *
     * @return integer
     */
    public function getNbplaces()
    {
        return $this->nbplaces;
    }

    /**
     * Add ticket
     *
     * @param \GestionMatchBundle\Entity\ticket $ticket
     *
     * @return event
     */
    public function addTicket(\GestionMatchBundle\Entity\ticket $ticket)
    {
        $this->tickets[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \GestionMatchBundle\Entity\ticket $ticket
     */
    public function removeTicket(\GestionMatchBundle\Entity\ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Set iduser
     *
     * @param \MyApp\UserBundle\Entity\User $iduser
     *
     * @return events
     */
    public function setIduser(\MyApp\UserBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \MyApp\UserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}
