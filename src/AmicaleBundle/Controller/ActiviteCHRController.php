<?php

namespace AmicaleBundle\Controller;

use AmicaleBundle\Entity\Activite;
use AmicaleBundle\Entity\Participation;
use AmicaleBundle\Form\ActiviteChariteType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class ActiviteCHRController extends  Controller
{
    public function indexAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("AmicaleBundle:Activite")->findAll();

        return $this->render('AmicaleBundle:ActiviteCHR:index.html.twig',
            array("activites" => $activite));


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

        $activite = new Activite("charite");

        $form = $this->createForm(ActiviteChariteType::class, $activite);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();
            return $this->redirectToRoute('Acceuil_ActiviteCHR');
        }
        /*test*/
        $validator = $this->get('validator');
        $errors = $validator->validate($activite);

        /*****/
        if (count($errors) >= 0) {
            return $this->render('AmicaleBundle:ActiviteCHR:create.html.twig', array('form' => $form->createView(), 'errors' => $errors));
        }
        return $this->render('AmicaleBundle:ActiviteCHR:create.html.twig', array('form' => $form->createView()));

    } //end ajout


    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("AmicaleBundle:Activite")->find($id);
        $form = $this->createForm(ActiviteChariteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();
            return $this->redirectToRoute('Acceuil_ActiviteCHR');
        }
        return $this->render('AmicaleBundle:ActiviteCHR:update.html.twig',
            array('form' => $form->createView()));
    }

    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $activite = $em->getRepository("AmicaleBundle:Activite")->find($id);
        $em->remove($activite);
        $em->flush();

        return $this->redirectToRoute('Acceuil_ActiviteCHR');


    }

    public function LoisirAction(Request $request)

    {


        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("AmicaleBundle:Activite")->findAll();

        return $this->render('AmicaleBundle:ActiviteCHR:indexCharite.html.twig',
            array("activites" => $activite));


    }

    public function ParticiperAction(Request $request, $id)

    {
        $participation = new Participation();


        $em = $this->getDoctrine()->getManager();

        $participation->setPrtId(4);
        $participation->setPrtMbrId($this->getUser()->getId());
        $participation->setPrtHeure(new \DateTime('now'));
        $participation->setPrtActId($id);
        $em->persist($participation);
        $em->flush();


        return $this->redirectToRoute('Acceuil_ActiviteCHR_Captcha');
    }
}