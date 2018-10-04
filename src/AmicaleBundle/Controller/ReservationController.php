<?php
/**
 * Created by PhpStorm.
 * User: wiem
 * Date: 22/03/2017
 * Time: 14:23
 */

namespace AmicaleBundle\Controller;

use AmicaleBundle\Entity\Reservation;
use AmicaleBundle\Entity\Offre;
use AmicaleBundle\Entity\Reserver;
use AmicaleBundle\Form\ReservationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Response;

class ReservationController extends Controller
{

    public function indexAction (Request $request){

        /*DQL*/
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
             'SELECT o FROM AmicaleBundle:Offre o 
              INNER JOIN AmicaleBundle:Reservation r WHERE o.ofrId = r.resOfrId'
        );

        $offre = $query->getResult();

        /********************************/

        $reservation=$em->getRepository("AmicaleBundle:Reservation")->findAll();

        return $this->render('AmicaleBundle:Reservation:index.html.twig',
            array("reservations"=>$reservation,"offres"=>$offre));
       // return $this ->render('AmicaleBundle:Reservation:index.html.twig');

    }
    public function pdfAction ($id){

        $em=$this->getDoctrine()->getManager();
        $reservation=$em->getRepository("AmicaleBundle:Reservation")->find($id);
        $query = $em->createQuery(
            'SELECT o FROM AmicaleBundle:Offre o 
              INNER JOIN AmicaleBundle:Reservation r WHERE o.ofrId = r.resOfrId AND r.resId='. $id
        );

        $offre = $query->getResult();
        $html = $this->renderView('AmicaleBundle:Reservation:htmlToPDF.html.twig',
            array("reservation"=>$reservation, "offre"=> $offre));

        $filename = sprintf('Reservation-%s.pdf', date('Y-m-d'));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );

    }
    public function testAction (Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $reservation = $em->getRepository("AmicaleBundle:Reservation")->find($id);
        $form = $this ->createForm(ReservationType::class,$reservation);
        $form ->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute('Acceuil_Reservation');
        }

        return $this ->render('AmicaleBundle:Reservation:update.html.twig',array('form'=> $form ->createView()));

    }
    public function createAction (Request $request){

        $reservation=new Reservation();
        $form = $this->createForm(ReservationType::class,$reservation);
        $form -> handleRequest($request);
        /*
         * refer reservation to the current user
        */
        $reserver = new Reserver();
        $user = $this->getUser()->getId();

        /*****************************************/
        if($form->isValid())
        {   $em=$this->getDoctrine()->getManager();
            $em->persist($reservation);
           /**/
            $em->flush();
            {
                $reserver->setMbrResId($user);
                $reserver->setResMbrId($reservation);
                $em->persist($reserver);
                $em->flush();
            }
            return $this -> redirectToRoute('Acceuil_Reservation');
        }
       // test
      /*  $validator = $this->get('validator');
        $errors = $validator->validate($reservation);

        if (count($errors) >= 0) {
            return $this ->render('AmicaleBundle:Reservation:create.html.twig',array('form'=> $form ->createView(), 'errors' => $errors,));
        }*/

        return $this ->render('AmicaleBundle:Reservation:create.html.twig',array('form'=> $form ->createView()));

    } //end ajout


    public function updateAction (Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $reservation = $em->getRepository("AmicaleBundle:Reservation")->find($id);
        $form = $this ->createForm(ReservationType::class,$reservation);
        $form ->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute('Acceuil_Reservation');
        }
        return $this ->render('AmicaleBundle:Reservation:update.html.twig',
            array('form'=>$form->createView()));
    }

    public function deleteAction (Request $request,$id){

        $em = $this->getDoctrine()->getManager();

        $reservation = $em ->getRepository("AmicaleBundle:Reservation")->find($id);
        $em->remove($reservation);
        $em->flush();

        return $this->redirectToRoute('Acceuil_Reservation');


    }

}