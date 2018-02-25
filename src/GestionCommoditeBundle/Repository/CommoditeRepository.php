<?php
/**
 * Created by PhpStorm.
 * User: AMAL
 * Date: 02/11/2018
 * Time: 9:00 PM
 */

namespace GestionCommoditeBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CommoditeRepository extends EntityRepository
{
    public function findByIdCommodite($IdCommodite)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.feedback = :id_commodite')
            ->addOrderBy('c.date')
            ->setParameter('id_commodite', $IdCommodite);

        return $qb->getQuery()
            ->getResult();
    }

    public function DQL($nomCommodite)
    {
        $em=$this->getEntityManager()->createQuery("SELECT commodite from GestionCommoditeBundle:Commodite commodite WHERE commodite.nomCommodite=:C");
        $em->setParameter('C',$nomCommodite);
        return $em->getResult();
    }

    public function Categorie($categorie)
    {
        $em=$this->getEntityManager()->createQuery("
SELECT commodite from GestionCommoditeBundle:Commodite commodite WHERE commodite.Categorie=:C");
        $em->setParameter('C',$categorie);
        return $em->getResult();
    }


//
//    public function DQL($nomCommodite)
//    {
//        $em=$this->getEntityManager()->createQuery("SELECT commodite from GestionCommoditeBundle:Commodite commodite WHERE commodite.nomCommodite=:C");
//        $em->setParameter('C',$nomCommodite);
//        return $em->getResult();
//    }


}