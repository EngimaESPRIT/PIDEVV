<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 21/02/2018
 * Time: 21:47
 */

namespace GestionTransport\Repository;


use Doctrine\ORM\EntityRepository;

class TransportRepository extends EntityRepository
{

    public function groupingTransport()
    {
        $query = $this->getEntityManager()->createQuery("SELECT count(u) FROM GestionTransportBundle:Transport u GROUP BY u.type");
        return $query->getResult();
    }


    public function tt()
    {
        $qb=$this->createQueryBuilder('s');
        $qb->select('count(s.idTransport')->getQuery()->getSingleResult();
        return $qb;
    }
}