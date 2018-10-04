<?php
/**
 * Created by PhpStorm.
 * User: wiem
 * Date: 22/03/2017
 * Time: 17:20
 */

namespace AmicaleBundle\Controller;


use AmicaleBundle\Entity\Offre;
use AmicaleBundle\Form\OffreType;
use  Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class OffreController extends  Controller
{
    public function indexAction (Request $request){


        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository("AmicaleBundle:Offre")->findAll();
            /*$query = $em->createQuery(
             'SELECT o FROM AmicaleBundle:Offre o 
              WHERE o.ofrDateDeb > CURRENT_DATE()'
        );
        $offre = $query->getResult();
        */
        return $this->render('AmicaleBundle:Offre:index.html.twig',
            array("offres"=>$offre));


    }
    public function pdfAction($id){

        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository("AmicaleBundle:Offre")->find($id);

        $html = $this->renderView('AmicaleBundle:Offre:htmlToPDF.html.twig',
            array("offre"=>$offre));

        $filename = sprintf('offre-%s.pdf', date('Y-m-d'));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );

    }
    public function testAction (){

        /*$em=$this->getDoctrine()->getManager();
        $membre=$em->getRepository("AmicaleBundle:User")->find($id);

        $html = $this->renderView('AmicaleBundle:Offre:acceuil.html.twig',
            array("membre"=>$membre));

        $filename = sprintf('test-%s.pdf', date('Y-m-d'));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );*/
        return $this->render('AmicaleBundle:Section:forum.html.twig');
    }
    public function createAction (Request $request){

        $offre=new Offre();

        $form = $this->createForm(OffreType::class,$offre);
        $form -> handleRequest($request);
        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();
            return $this -> redirectToRoute('Acceuil_Offre');
        }
        /*test*/
        $validator = $this->get('validator');
        $errors = $validator->validate($offre);

        /*****/
        if (count($errors) >= 0) {
            return $this ->render('AmicaleBundle:Offre:create.html.twig',array('form'=> $form ->createView(), 'errors' => $errors,));
        }
        return $this ->render('AmicaleBundle:Offre:create.html.twig',array('form'=> $form ->createView()));

    } //end ajout


    public function updateAction (Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $offre = $em->getRepository("AmicaleBundle:Offre")->find($id);
        $form = $this ->createForm(OffreType::class,$offre);
        $form ->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();
            return $this->redirectToRoute('Acceuil_Offre');
        }
        return $this ->render('AmicaleBundle:Offre:update.html.twig',
            array('form'=>$form->createView()));
    }

    public function deleteAction (Request $request,$id){

        $em = $this->getDoctrine()->getManager();

        $offre = $em ->getRepository("AmicaleBundle:Offre")->find($id);
        $em->remove($offre);
        $em->flush();

        return $this->redirectToRoute('Acceuil_Offre');


    }


}