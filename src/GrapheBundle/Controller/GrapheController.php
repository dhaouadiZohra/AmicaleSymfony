<?php

namespace GrapheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Zend\Json\Expr;


class GrapheController extends Controller
{
    public function chartLineAction()
    {
        // Chart
        $series = array(
            array("name" => "Gestion des abonnements", "data" => array(1,2,4,5,6,3,8))
        );
        $ob = new Highchart();
        $ob->chart->renderTo('linechart'); // #id du div où afficher le graphe
        $ob->title->text('Statistique des abonnements');

 $ob->xAxis->title(array('text' => "Taux des abonnements"));
 $ob->yAxis->title(array('text' => "Taux des forfaits "));
 $ob->series($series);
        return $this->render('GrapheBundle:Graphe:chart_line.html.twig', array(
            'chart' => $ob
        ));
    }

    public function histogrammeAction()
    {

        $series = array(
            array(
                'name' => 'Benefice',
                'type' => 'column',
                'color' => '#4572A7',
                'yAxis' => 1,
                'data' => array(49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4),
            ),
            array(
                'name' => 'Ad',
                'type' => 'spline',
                'color' => '#AA4643',
                'data' => array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6),
            ),
        );
        $yData = array(
            array(
                'labels' => array(
                    'formatter' => new Expr('function () { return this.value + " Abonnées" }'),
                    'style' => array('color' => '#AA4643')
                ),
                'title' => array(
                    'text' => 'Adhésion',
                    'style' => array('color' => '#AA4643')
                ),
                'opposite' => true,
            ),
            array(
                'labels' => array(
                    'formatter' => new Expr('function () { return this.value + " Dt/M " }'),
                    'style' => array('color' => '#4572A7')
                ),
                'gridLineWidth' => 0,
                'title' => array(
                    'text' => 'Benefice',
                    'style' => array('color' => '#4572A7')
                ),
            ),
        );

$categories = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
$ob = new Highchart();
$ob->chart->renderTo('container'); // The #id of the div where to render the chart
$ob->chart->type('column');
$ob->title->text('Moyenne des abonnements par mois');
$ob->xAxis->categories($categories);
$ob->yAxis($yData);
$ob->legend->enabled(false);
$formatter = new Expr('function () {
 var unit = {
 "Benefice": "Dt/M",
 "Adhésion": "Abonnées"
 }[this.series.name];
 return this.x + ": <b>" + this.y + "</b> " + unit;
 }');
$ob->tooltip->formatter($formatter);
$ob->series($series);
return $this->render('GrapheBundle:Graphe:histogramme.html.twig', array(
    'chart' => $ob
));
}
    public function pieAction(){
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Gestion des abonnements par type');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => false),
            'showInLegend' => true
        ));
        $data = array(
            array('Sport', 45.0),
            array('Dance', 26.8),
            array('Transport', 12.8),
            array('Festivals', 8.5),
            array('Théatre', 4.2),
            array('Théatre', 2.2),
            array('Autre', 0.7),
        );
        $ob->series(array(array('type' => 'pie','name' => 'Browser share', 'data' => $data)));
        return $this->render('GrapheBundle:Graphe:pie.html.twig', array(
            'chart' => $ob
        ));
    }




}
