<?php

namespace AmicaleBundle\Controller;

use AmicaleBundle\Entity\Activite;
use AmicaleBundle\Entity\Participation;
use AmicaleBundle\Form\ActiviteLoisirType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Doctrine\DBAL;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class ActiviteController extends  Controller
{
    public function indexAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("AmicaleBundle:Activite")->findAll();

        return $this->render('AmicaleBundle:ActiviteLSR:index.html.twig',
            array("activites" => $activite));


    }

    public function ParticipationsAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("AmicaleBundle:Activite")->findAll();
        $participation = $em->getRepository("AmicaleBundle:Participation")->findAll();

        return $this->render('AmicaleBundle:ActiviteLSR:participations.html.twig',
            array("participations" => $participation, "activites" => $activite));


    }

    /*
        public function testAction($id)
        {

            $em = $this->getDoctrine()->getManager();
            $membre = $em->getRepository("AmicaleBundle:User")->find($id);

            $html = $this->renderView('AmicaleBundle:Offre:acceuil.html.twig',
                array("membre" => $membre));

            $filename = sprintf('test-%s.pdf', date('Y-m-d'));

            return new Response(
                $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
                ]
            );

        }
    */
    public function createAction(Request $request)
    {

        $activite = new Activite("loisir");

        $form = $this->createForm(ActiviteLoisirType::class, $activite);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();
            return $this->redirectToRoute('Acceuil_ActiviteLSR');
        }
        /*test*/
        $validator = $this->get('validator');
        $errors = $validator->validate($activite);

        /*****/
        if (count($errors) >= 0) {
            return $this->render('AmicaleBundle:ActiviteLSR:create.html.twig', array('form' => $form->createView(), 'errors' => $errors));
        }
        return $this->render('AmicaleBundle:ActiviteLSR:create.html.twig', array('form' => $form->createView()));

    }


    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("AmicaleBundle:Activite")->find($id);
        $form = $this->createForm(ActiviteLoisirType::class, $activite);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();
            return $this->redirectToRoute('Acceuil_ActiviteLSR');
        }
        return $this->render('AmicaleBundle:ActiviteLSR:update.html.twig',
            array('form' => $form->createView()));
    }

    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $activite = $em->getRepository("AmicaleBundle:Activite")->find($id);
        $em->remove($activite);
        $em->flush();

        return $this->redirectToRoute('Acceuil_ActiviteLSR');


    }

    public function LoisirAction(Request $request)

    {


        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("AmicaleBundle:Activite")->findAll();

        return $this->render('AmicaleBundle:ActiviteLSR:indexLoisir.html.twig',
            array("activites" => $activite));


    }

    public function ParticiperAction(Request $request, $id)

    {
        $participation = new Participation();


        $em = $this->getDoctrine()->getManager();

            $participation->setPrtId(4);
            $participation->setPrtMbrId(1);
            $participation->setPrtHeure(new \DateTime('now'));
            $participation->setPrtActId($id);
            $em->persist($participation);
            $em->flush();


        return $this->redirectToRoute('Acceuil_Activite_Captcha');
    }

    public function chartPieAction(){
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Répartition des participations de chaque membre sur les activités');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => false),
            'showInLegend' => true
        ));
        $em = $this->getDoctrine()->getEntityManager();
        $sql="SELECT COUNT (prt.prtMbrId) AS Membre, prt.prtActId AS ACT FROM AmicaleBundle:Participation prt GROUP BY prt.prtActId";
        $result= $em->createQuery($sql)->getResult();

        $data = array();
        foreach ($result as $values)
        {
            $prt=array($values['Membre'],intval($values['ACT']));
            array_push($data,$prt);
        }


        $ob->series(array(array('type' => 'pie','name' => 'Nombre de participations du membre', 'data' => $data)));
        return $this->render('AmicaleBundle:ActiviteLSR:stat.html.twig', array(
            'chart' => $ob,

        ));
    }

}