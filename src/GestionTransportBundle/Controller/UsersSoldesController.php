<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 25/02/2018
 * Time: 00:23
 */

namespace GestionTransportBundle\Controller;


use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use MyApp\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersSoldesController extends Controller
{


    public function graphAction()
    {
        $pieChart = new PieChart();
        $em = $this->getDoctrine();


        $users = $em->getRepository(User::class)->findAll();

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
        $pieChart->getOptions()->setTitle('Statistique Utilisateur/Solde');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#2A3F54');
        // $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Consolas')->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@GestionTransport/Default/GrapheBundle.html.twig', array('piechart' => $pieChart));

    }

}