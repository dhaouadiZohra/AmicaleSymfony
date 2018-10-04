<?php
/**
 * Created by PhpStorm.
 * User: wiem
 * Date: 26/03/2017
 * Time: 15:31
 */

namespace AmicaleBundle\Controller;


use AmicaleBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class MembreController extends Controller
{
    public function indexAction (Request $request){

        $em=$this->getDoctrine()->getManager();
        $membres=$em->getRepository("AmicaleBundle:User")->findAll();
        return $this->render('AmicaleBundle:Membre:index.html.twig',
            array("membres"=>$membres));
        //return $this ->render('AmicaleBundle:Membre:index.html.twig');

    }
    public function detailAction(Request$request,$id){
        $em=$this->getDoctrine()->getManager();
        $membre=$em->getRepository("AmicaleBundle:User")->find($id);
        return $this->render('AmicaleBundle:Membre:detail.html.twig',
            array("membre"=>$membre));
    }
    public function updateAction (Request $request,$id){

       /* $em=$this->getDoctrine()->getManager();
        $offre = $em->getRepository("AmicaleBundle:User")->find($id);
        $form = $this ->createForm(Type::class,$offre);
        $form ->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();
            return $this->redirectToRoute('Acceuil_Offre');
        }*/
        return $this ->render('AmicaleBundle:Membre:update.html.twig'/*,
            array('form'=>$form->createView())*/);
    }

    public function deleteAction (Request $request,$id){

        $em = $this->getDoctrine()->getManager();

        $membre = $em ->getRepository("AmicaleBundle:User")->find($id);
        $em->remove($membre);
        $em->flush();

        return $this->redirectToRoute('Acceuil_Membre');

    }

    public function pdfAction ($id){

        $em=$this->getDoctrine()->getManager();
        $membre=$em->getRepository("AmicaleBundle:User")->find($id);

        $html = $this->renderView('AmicaleBundle:Membre:htmlToPDF.html.twig',
            array("membre"=>$membre));

        $filename = sprintf('Membre-%s.pdf', date('Y-m-d'));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );

    }
}