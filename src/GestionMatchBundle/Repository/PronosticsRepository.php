<?php
/**
 * Created by PhpStorm.
 * User: medme
 * Date: 20/02/2018
 * Time: 17:42
 */
namespace GestionMatchBundle\Repository;

class PronosticsRepository extends  \Doctrine\ORM\EntityRepository
{
    public function findArray($array)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')->where('u.idProno IN (:array)')
            ->setParameter('array',$array);
        return $qb->getQuery()->getResult();
    }

}