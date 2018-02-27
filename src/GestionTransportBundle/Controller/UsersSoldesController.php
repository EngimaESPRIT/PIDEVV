<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 25/02/2018
 * Time: 00:23
 */

namespace GestionTransportBundle\Controller;


use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use GestionTransportBundle\Form\AlimenterSoldeType;
use MyApp\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersSoldesController extends Controller
{
    const ANIMATION_STARTUP = true;
    const ANIMATION_DURATION = 8000;
    const CHART_AREA_HEIGHT = '50%';
    const CHART_AREA_WIDTH = '50%';


    public function alimenterSoldeAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $xd = $em->getRepository('MyAppUserBundle:User')->find($this->getUser());

        $Form = $this->createForm(AlimenterSoldeType::class);
        $Form->handleRequest($request);

        if ($Form->isValid()) {
            $vouch = $Form->get('soldes')->getData();


            if ($vouch == "esprit") {


                $xd->setSoldes($xd->getSoldes() + 50);
                $em->persist($xd);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Recharge aboutie');
                return $this->redirectToRoute('successRecharge');

            }
            else {
                $this->get('session')->getFlashBag()->add('alert', 'Recharge non aboutie');

                 return $this->render('GestionTransportBundle:Default:AlimenterSolde.html.twig', array('f' => $Form->createView()));


            }
        }
        return $this->render('GestionTransportBundle:Default:AlimenterSolde.html.twig', array('f' => $Form->createView()));
    }



    public function successAction()
    {
        return $this->render('@GestionTransport/Default/success.html.twig');
    }





    public function graphAction()
    {
        $pieChart = new PieChart();
        $em = $this->getDoctrine();
        $users = $em->getRepository(User::class)->findAll();


        //First kind of stat (pie chart)

        $totalSoldes = 0;
        foreach ($users as $item) {
            $totalSoldes = $totalSoldes + $item->getSoldes();
        }
        $data = array();
        $stat = ['user', 'soldes'];
        $nb = 0;
        array_push($data, $stat);

        foreach ($users as $item) {
            $stat = array();
            array_push($stat, $item->getUsername(), (($item->getSoldes()) * 100) / $totalSoldes);
            $nb = ($item->getSoldes() * 100) / $totalSoldes;
            $stat = [$item->getUsername(), $nb];
            array_push($data, $stat);
        }

        $pieChart->getData()->setArrayToDataTable($data);
        $pieChart->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $pieChart->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);
        $pieChart->getOptions()->setTitle('Pourecentage des soldes par Utilisateur');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#2A3F54');

        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Consolas')->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);


        //second kind of stat ( ColumnChart)

        $pc = new ColumnChart();

        $totalSoldes = 0;

        foreach ($users as $item) {
            $totalSoldes = $totalSoldes + $item->getSoldes();
        }
        $data = array();
        $stat = ['user', 'soldes'];
        $nb = 0;
        array_push($data, $stat);

        foreach ($users as $item) {
            $stat = array();
            array_push($stat, $item->getUsername(), (($item->getSoldes())));
            $nb = ($item->getSoldes());
            $stat = [$item->getUsername(), $nb];
            array_push($data, $stat);
        }


        $pc->getData()->setArrayToDataTable($data);
        $pc->getOptions()->getAnimation()->setStartup(self::ANIMATION_STARTUP);
        $pc->getOptions()->getAnimation()->setDuration(self::ANIMATION_DURATION);
        $pc->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $pc->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);

        $pc->getOptions()->setTitle('Utilisateur(s) ayant le MAXIMUM des soldes');
        $pc->getOptions()->setHeight(500);
        $pc->getOptions()->setWidth(900);
        $pc->getOptions()->getTitleTextStyle()->setBold(true);
        $pc->getOptions()->getTitleTextStyle()->setColor('#2A3F54');
        $pc->getOptions()->setColors(['#1a42bc', '#759e1a']);


        $pc->getOptions()->getTitleTextStyle()->setFontName('Consolas')->setBold(true);
        $pc->getOptions()->getTitleTextStyle()->setFontSize(20);
        $pc->getOptions()->getHAxis()->setTitle('Utilisateurs');
        $pc->getOptions()->getVAxis()->setTitle('Soldes');


        return $this->render('@GestionTransport/Default/GrapheBundle.html.twig', array('piechart' => $pieChart, 'pc' => $pc));

    }

}