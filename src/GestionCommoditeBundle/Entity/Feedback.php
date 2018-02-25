<?php

namespace GestionCommoditeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Feedback
 *
 * @ORM\Table(name="feedback", indexes={@ORM\Index(name="id_commodite", columns={"id_commodite"}), @ORM\Index(name="fk_user_comm", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="GestionCommoditeBundle\Repository\FeedbackRepository")
 */
class Feedback
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_feedback", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFeedback;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=250, nullable=true)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer", nullable=true)
     */
    private $rate;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_acceuil", type="integer", nullable=true)
     */
    private $rateAcceuil;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_cuisine", type="integer", nullable=true)
     */
    private $rateCuisine;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_ambiance", type="integer", nullable=true)
     */
    private $rateAmbiance;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_rqp", type="integer", nullable=true)
     */
    private $rateRqp;

    /**
     * @var integer
     *
     * @ORM\Column(name="average_rate", type="integer", nullable=true)
     */
    private $averageRate;
    /**
     * @var DateTime
     *
     * @ORM\Column(name="dateCommentaire", nullable=true,type="datetime")
     */
    private $dateCommentaire;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    public $idUser;

    /**
     * @var \Commodite
     *
     * @ORM\ManyToOne(targetEntity="Commodite")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="id_commodite", referencedColumnName="id_commodite",onDelete="CASCADE")
     * })
     */
    private $idCommodite;

    /**
     * @return int
     */

    public function __construct()
    {
        $this->setdateCommentaire(new \DateTime());

    }



    public function getIdFeedback()
    {
        return $this->idFeedback;
    }

    /**
     * @param int $idFeedback
     */
    public function setIdFeedback($idFeedback)
    {
        $this->idFeedback = $idFeedback;
    }

    /**
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return int
     */
    public function getRateAcceuil()
    {
        return $this->rateAcceuil;
    }

    /**
     * @param int $rateAcceuil
     */
    public function setRateAcceuil($rateAcceuil)
    {
        $this->rateAcceuil = $rateAcceuil;
    }

    /**
     * @return int
     */
    public function getRateCuisine()
    {
        return $this->rateCuisine;
    }

    /**
     * @param int $rateCuisine
     */
    public function setRateCuisine($rateCuisine)
    {
        $this->rateCuisine = $rateCuisine;
    }

    /**
     * @return int
     */
    public function getRateAmbiance()
    {
        return $this->rateAmbiance;
    }

    /**
     * @param int $rateAmbiance
     */
    public function setRateAmbiance($rateAmbiance)
    {
        $this->rateAmbiance = $rateAmbiance;
    }

    /**
     * @return int
     */
    public function getRateRqp()
    {
        return $this->rateRqp;
    }

    /**
     * @param int $rateRqp
     */
    public function setRateRqp($rateRqp)
    {
        $this->rateRqp = $rateRqp;
    }

    /**
     * @return int
     */
    public function getAverageRate()
    {
        return $this->averageRate;
    }

    /**
     * @param int $averageRate
     */
    public function setAverageRate($averageRate)
    {
        $this->averageRate = $averageRate;
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

    /**
     * @return DateTime
     */
    public function getDateCommentaire()
    {
        return $this->dateCommentaire;
    }
    /**
     * @param DateTime $dateCommentaire
     */
    public function setDateCommentaire($dateCommentaire)
    {
        $this->dateCommentaire = $dateCommentaire;
    }


}

