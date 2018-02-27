<?php


namespace GestionMatchBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use MyApp\UserBundle\Entity\User as User;

/**
 * @ORM\Entity
 * @ORM\Table(name="ticket")
 * @ORM\HasLifecycleCallbacks
 */
class ticket
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idticket;
    /**
     * Many tickets have One event.
     * @ORM\ManyToOne(targetEntity="events", inversedBy="tickets")
     * @ORM\JoinColumn(name="idevent", referencedColumnName="idevent")
     */
    private $event;
    /**
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id")
     */
    private $iduser;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $codeticket;



    /** @ORM\PrePersist */
    public function doStuffOnPrePersist()
    {
        $this->codeticket = md5(((string)$this->getIdticket()).'reaper');
    }


    /**
     * Get idticket
     *
     * @return integer
     */
    public function getIdticket()
    {
        return $this->idticket;
    }

    /**
     * Set event
     *
     * @param \GestionMatchBundle\Entity\events $event
     *
     * @return ticket
     */
    public function setEvent(\GestionMatchBundle\Entity\events $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \GestionMatchBundle\Entity\events
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set iduser
     *
     * @param \MyApp\UserBundle\Entity\User $iduser
     *
     * @return ticket
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
    public function getCodeticket()
    {
        return $this->codeticket;
    }

    /**
     * @param mixed $codeticket
     */
    public function setCodeticket($codeticket)
    {
        $this->codeticket = $codeticket;
    }
}
