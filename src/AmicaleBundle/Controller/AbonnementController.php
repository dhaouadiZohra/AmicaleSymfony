<?php

namespace AmicaleBundle\Controller;
use AmicaleBundle\AbonnementBundle;
use AmicaleBundle\Entity;
use AmicaleBundle\Form;
use AmicaleBundle\Repository;
use AmicaleBundle\Entity\Abonnement;
use AmicaleBundle\Form\personneType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Abonnement controller.
 *
 * @Route("abonnement")
 */
class AbonnementController extends Controller
{
    public function indexAction (Request $request){


        $em=$this->getDoctrine()->getManager();

        $Abonnement=$em->getRepository("AmicaleBundle:Abonnement")->findAll();

        return $this->render('AmicaleBundle:Abonnement:index.html.twig',
            array("Abonnements"=>$Abonnement));
        return $this ->render('AmicaleBundle:Abonnement:index.html.twig');

    }
    public function indexFrontAction (Request $request){


        $em=$this->getDoctrine()->getManager();

        $Abonnement=$em->getRepository("AmicaleBundle:Abonnement")->findAll();
        return $this->render('AmicaleBundle:Abonnement:indexFront.html.twig',
            array("Abonnements"=>$Abonnement));
        return $this ->render('AmicaleBundle:Abonnement:indexFront.html.twig');

    }

    public function testAction (Request $request){
        $em=$this->getDoctrine()->getManager();

        $Abonnement=$em->getRepository("AmicaleBundle:Abonnement")->findAll();
        return $this->render('AmicaleBundle:Abonnement:acceuil.html.twig',
            array("Abonnements"=>$Abonnement));
        return $this ->render('AmicaleBundle:Abonnement:acceuil.html.twig',array('form'=> $form ->createView()));

    }
    public function createAction (Request $request){

        $Abonnement=new Abonnement();
        $form = $this->createForm(personneType::class,$Abonnement);
        $form -> handleRequest($request);
        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($Abonnement);
            $em->flush();
            return $this -> redirectToRoute('index');
        }
        return $this ->render('AmicaleBundle:Abonnement:create.html.twig',array('form'=> $form ->createView()));

    } //end ajout


    public function updateAction (Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $Abonnement = $em->getRepository("AmicaleBundle:Abonnement")->find($id);
        $form = $this ->createForm(personneType::class,$Abonnement);
        $form ->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Abonnement);
            $em->flush();
            return $this->redirectToRoute('index');
        }
        return $this ->render('AmicaleBundle:Abonnement:update.html.twig',
            array('form'=>$form->createView()));
    }

    public function deleteAction (Request $request,$id){

        $em = $this->getDoctrine()->getManager();

        $Abonnement = $em ->getRepository("AmicaleBundle:Abonnement")->find($id);
        $em->remove($Abonnement);
        $em->flush();

        return $this->redirectToRoute('index');


    }
}
