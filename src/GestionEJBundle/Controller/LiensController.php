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
use GestionEJBundle\Form\AjoutEquipe;
use NatocTo\FootballData\FootballData;
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
        {             $nbmatches=$nbbuts+$j->getMatchescm();

        }

        $data= array();
        $stat=['Equipes', 'Victoires'];
        $nb=0;
        array_push($data,$stat);

        foreach($equipes as $j) {
            $stat=array();
            array_push($stat,$j->getNom(),(($j->getMatchwins()) *100)/$nbmatches);
            $nb=(($j->getMatchwins()) *100)/$nbmatches;
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
            return $this->render('@GestionEJ/TemplateAdmin/index.html.twig',array('piechart'=>$pieChart,'columnchart'=>$ColumnChart));
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