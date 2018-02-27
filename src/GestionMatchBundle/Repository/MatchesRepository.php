<?php
/**
 * Created by PhpStorm.
 * User: medme
 * Date: 23/02/2018
 * Time: 16:22
 */

namespace GestionMatchBundle\Repository;


class MatchesRepository extends  \Doctrine\ORM\EntityRepository
{
    public function TrouverButsDQL()
    {
        $querry=$this->getEntityManager()
            ->createQuery("SELECT butequipe1 from GestionMatchBundle:Matches M, GestionEJBundle:Equipe E WHERE M.EquipeA=E.IDEquipe");
        return $querry->getQuery()->getResult();
    }
    public function TrouverMatches($id)
    {
        $querry=$this->getEntityManager()
            ->createQuery("SELECT m from GestionMatchBundle:Matches m WHERE m.equipea=:id OR m.equipeb=:id");
        $querry->setParameter('id',$id);
        return $querry->getResult();
    }


}