<?php
namespace GestionEJBundle\Repository;
/**
 * EquipeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EquipeRepository extends \Doctrine\ORM\EntityRepository
{
public function afficherparClassement()
{
    $em=$this->getEntityManager()->createQuery("SELECT m from GestionEJBundle:Equipe m ORDER BY m.classementfifa ASC ");
    $a=$em->setMaxResults(8);
    return $a->getResult();
}
    public function afficherparVictoires()
    {
        $em=$this->getEntityManager()->createQuery("SELECT m from GestionEJBundle:Equipe m ORDER BY m.matchwins DESC ");
        $a=$em->setMaxResults(16);
        return $a->getResult();
    }
    public function equipeFavorite($eq,$id)
    {
        $em=$this->getEntityManager()->createQuery("UPDATE GestionEJBundle:Equipe m set m.equipefavorite=:S where m.id=:D ");
        $em->setParameter('S',$eq);
        $em->setParameter('D',$id);
        return $em->getResult();

    }

}