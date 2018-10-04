<?php
/**
 * Created by PhpStorm.
 * User: Safa
 * Date: 25/03/2017
 * Time: 21:44
 */

namespace AmicaleBundle\Controller;


use AmicaleBundle\Form\SectionForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AmicaleBundle\Entity\Section;
use Symfony\Component\HttpFoundation\Request;


class SectionController extends Controller
{
    public function forumAction()
    {
        return $this->render('AmicaleBundle:Section:forum1.html.twig');
    }

    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $sections=$em->getRepository("AmicaleBundle:Section")->findAll();
        return $this->render('AmicaleBundle:Section:index.html.twig',array("sections"=>$sections));
    }
    public function listerAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $sections=$em->getRepository("AmicaleBundle:Section")->findBy(array('archive' => 0));
        return $this->render('AmicaleBundle:Section:forum1.html.twig',array("sections"=>$sections));

    }
    public function listerarchiveAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $sections=$em->getRepository("AmicaleBundle:Section")->findBy(array('archive' => 1));
        return $this->render('AmicaleBundle:Section:archives.html.twig',array("sections"=>$sections));

    }
    public function ajoutAction(Request $request)
    {

        $section=new Section();
        if($request->isMethod('POST')){
            $section->setNomSec($request->get('secNom'));
            $section->setDateSec(new \DateTime('now'));
            $section->setArchive(0);
            $em=$this->getDoctrine()->getManager();
            $em->persist($section);
            $em->flush();
            return $this->redirectToRoute('LesSections');
        }

        $em=$this->getDoctrine()->getManager();
        $sections=$em->getRepository("AmicaleBundle:Section")->findAll();
        return $this->render('AmicaleBundle:Section:forum1.html.twig',array("sections"=>$sections));

    }
    public function archiverAction($id,request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $section=$em->getRepository('AmicaleBundle:Section')->find($id);
        $section->setArchive(1);

        $em->persist($section);
        $em->flush();

        $em=$this->getDoctrine()->getManager();
        $sections=$em->getRepository("AmicaleBundle:Section")->findBy(array('archive' => 0));
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
       /* $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $sections,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)
        );/*/
        return $this->render('AmicaleBundle:Section:archives.html.twig',array("sections"=>$sections));
       // return $this->render('AmicaleBundle:Section:archives.html.twig');

    }
    public function updateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $section=$em->getRepository('AmicaleBundle:Section')->find($id);
        $form=$this->createForm(SectionForm::class,$section);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($section);
            $em->flush();
            return $this->redirectToRoute('Index_Section');
        }
        return $this->render('AmicaleBundle:Section:update.html.twig',array('form'=>$form->createView()));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $sections=$em->getRepository('AmicaleBundle:Section')->find($id);
        $em->remove($sections);
        $em->flush();
        return $this->redirectToRoute('Index_Section');
    }

}