<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 05/02/2018
 * Time: 23:08
 */
namespace GestionEJBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use GestionEJBundle\Entity\Equipe;
use GestionEJBundle\Entity\Joueur;
use GestionEJBundle\Entity\Stade;
use GestionEJBundle\Form\AjoutEquipe;
use NatocTo\FootballData\FootballData;
use Nette\Utils\DateTime;
use Symfony\Component\HttpFoundation\Request;
use GestionEJBundle\Controller\JoueurController;

class LiensController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{

    public function GoToPlayersAction()
    {

        return $this->render('@GestionEJ/template 2/players.html.twig');

    }
    public function GoToAdminAction()
    {
        $user=$this->getUser();
        $token = $this->get('security.token_storage')->getToken();
        $auth_checker = $this->get('security.authorization_checker');
        $user = $token->getUser();

        $pieChart = new PieChart();
        $em= $this->getDoctrine();
        $joueurs = $em->getRepository('GestionEJBundle:Joueur')->afficherparButs();
        $jou = $em->getRepository('GestionEJBundle:Joueur')->findAll();
        $equ = $em->getRepository('GestionEJBundle:Equipe')->findAll();
        $wins=0;
        $nbe=0;
        $first=0;
foreach ($equ as $e)
{
    $wins=$wins+$e->getMatchwins();
    $nbe=$nbe+1;
    if ($e->getParticipations()==0)
    {
        $first=$first+1;
    }
}
$first=($first*100)/$nbe;
$wins=$wins/$nbe;

        $nbj=0;
        foreach ($jou as $j)
        {
            $nbj=$nbj+1;
        }
        $date=new \DateTime('now');

        $years=0;
        $nbjj=0;
        $buts=0;
        foreach ($jou as $j)
        {
     $d=$date->format('Y')-$j->getDatedenaissance()->format('Y');
     $buts=$buts+$j->getButs();
     $years=$years+$d;
     $nbjj=$nbjj+1;
        }
        $buts=$buts/$nbjj;
$years=$years/$nbjj;
        $years=round($years);
        echo $years;
        $st= $em->getRepository('GestionEJBundle:Stade')->findAll();

        $s=new Stade();
        $nb=0;
        $tot=0;
         foreach ($st as $s)
         {
$nb=$nb+1;
         }

         foreach($st as $s)
         {
            $tot=($tot)+($s->getCapacite());
         }

         $statstade=$tot/$nb;



        $nbbuts=0;
        foreach($joueurs as $j)
        {             $nbbuts=$nbbuts+$j->getButs();

        }

        $data= array();
        $stat=['Joueurs', 'Buts Marqué '];
        $nb=0;
        array_push($data,$stat);

        foreach($joueurs as $j) {
            $stat=array();
            array_push($stat,$j->getNom(),(($j->getButs()) *100)/$nbbuts);
            $nb=(($j->getButs()) *100)/$nbbuts;
            $stat=[$j->getNom(),$nb];
            array_push($data,$stat);

        }

        $pieChart->getData()->setArrayToDataTable(            $data         );
        $pieChart->getOptions()->setTitle('Pourcentage des buts pour chaque joueurs');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $ColumnChart = new ColumnChart();
        $equipes = $em->getRepository('GestionEJBundle:Equipe')->afficherparVictoires();


        $nbmatches=0;
        foreach($equipes as $j)
        {             $nbmatches=$nbmatches+$j->getMatchescm();

        }

        $data= array();
        $stat=['Equipes', 'Victoires'];
        $nb=0;
        array_push($data,$stat);

        foreach($equipes as $j) {
            $stat=array();
            array_push($stat,$j->getNom(),(($j->getMatchwins()) *100)/$j->getMatchescm());
            $nb=(($j->getMatchwins()) *100)/$j->getMatchescm();
            $stat=[$j->getNom(),$nb];
            array_push($data,$stat);

        }

        $ColumnChart ->getData()->setArrayToDataTable(            $data         );
        $ColumnChart ->getOptions()->setTitle('top 16 Pourcentage des victoires des equipes Par Rapport au matches quelle ont joué');
        $ColumnChart ->getOptions()->setHeight(500);
        $ColumnChart ->getOptions()->setWidth(900);
        $ColumnChart ->getOptions()->getTitleTextStyle()->setBold(true);
        $ColumnChart ->getOptions()->getTitleTextStyle()->setColor('#009900');
        $ColumnChart ->getOptions()->getTitleTextStyle()->setItalic(true);
        $ColumnChart ->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $ColumnChart ->getOptions()->getTitleTextStyle()->setFontSize(20);
        if ($auth_checker->isGranted('ROLE_ADMIN')==true)
        {
            return $this->render('@GestionEJ/TemplateAdmin/index.html.twig',array('piechart'=>$pieChart,'columnchart'=>$ColumnChart,'stade'=>$statstade,'j'=>$nbj,'moy'=>$years,'b'=>$buts,'w'=>$wins,'f'=>$first));
        }
        else{
            return $this->render('GestionEJBundle:template 2:page-404.html.twig');

        }

    }
    public function erreurAction()
    {
        return $this->render('GestionEJBundle:template 2:page-404.html.twig');
    }
    public function GoToFixturesAction()
{
    return $this->render('@GestionEJ/template 2/fixtures.html.twig');
}
    public function GoToGroupesAction()
    {

        return $this->render('@GestionEJ/template 2/groups.html.twig');
    }
    public function GoToContactAction()
    {
        return $this->render('@GestionEJ/template 2/contact.html.twig');
    }

}