<?php
/**
 * Created by PhpStorm.
 * User: AMAL
 * Date: 02/20/2018
 * Time: 6:35 PM
 */

namespace GestionCommoditeBundle\Repository;


use Doctrine\ORM\EntityRepository;
use GestionCommoditeBundle\Entity\Feedback;

class FeedbackRepository extends EntityRepository
{
    public function countAmbiancerate($idCommodite)
    {
        $q = $this->getEntityManager()->createQuery("
        select AVG(r.rateAmbiance) from GestionCommoditeBundle:Feedback r where r.idCommodite= '$idCommodite'");
        /*$query = $this->getEntityManager()
            ->createQuery("select AVG (r.rate_ambiance) from GestionCommodite:Feedback  r where r.idCommodite='$idCommodite' ");*/
        return $q->getSingleResult();
    }

    public function countAccueilrate($idCommodite)
    {
        $q = $this->getEntityManager()->createQuery("
        select AVG(r.rateAcceuil) from GestionCommoditeBundle:Feedback r where r.idCommodite='$idCommodite' ");
        /*$query = $this->getEntityManager()
            ->createQuery("select AVG (r.rate_ambiance) from GestionCommodite:Feedback  r where r.idCommodite='$idCommodite' ");*/
        return $q->getSingleResult();
    }

    public function countQPrate($idCommodite)
    {
        $q = $this->getEntityManager()->createQuery("
        select AVG(r.rateRqp) from GestionCommoditeBundle:Feedback r where r.idCommodite='$idCommodite' ");
        /*$query = $this->getEntityManager()
            ->createQuery("select AVG (r.rate_ambiance) from GestionCommodite:Feedback  r where r.idCommodite='$idCommodite' ");*/
        return $q->getSingleResult();
    }
    public function countCuisinerate($idCommodite)
    {
        $q = $this->getEntityManager()->createQuery("
        select AVG(r.rateCuisine) from GestionCommoditeBundle:Feedback r where r.idCommodite='$idCommodite' ");
        /*$query = $this->getEntityManager()
            ->createQuery("select AVG (r.rate_ambiance) from GestionCommodite:Feedback  r where r.idCommodite='$idCommodite' ");*/
        return $q->getSingleResult();
    }
}