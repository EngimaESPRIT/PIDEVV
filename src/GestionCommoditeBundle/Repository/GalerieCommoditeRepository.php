<?php
/**
 * Created by PhpStorm.
 * User: AMAL
 * Date: 02/11/2018
 * Time: 9:00 PM
 */

namespace GestionCommoditeBundle\Repository;


use Doctrine\ORM\EntityRepository;

class GalerieCommoditeRepository extends EntityRepository
{


    public function findGalByIdCommodite($IdCommodite)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.galeriecommodite = :id_commodite')

            ->setParameter('id_commodite', $IdCommodite);
        return $qb->getQuery()
            ->getResult();}
}