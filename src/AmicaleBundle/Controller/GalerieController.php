<?php
/**
 * Created by PhpStorm.
 * User: MARIEM
 * Date: 27/03/2017
 * Time: 21:18
 */

namespace AmicaleBundle\Controller;
use AmicaleBundle\Form\GalerieType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\UploadedFile ;
use AmicaleBundle\AmicaleBundle;
use AmicaleBundle\Entity\Galerie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;


class GalerieController extends Controller
{

    function indexAction(Request $request){

        $em=$this->getDoctrine()->getManager();
        $galeries=$em->getRepository("AmicaleBundle:Galerie")->findAll();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator  = $this->get('knp_paginator');
        $result = $paginator->paginate(
          $galeries,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',4)
        );

        //return $this->render('AmicaleBundle:Galerie:index.html.twig',array('galeries'=>$result));
        $galerie = 'x';
        $exist = false;
        //DQL
        if($request->isMethod('GET'))
        {
            $img = $request->get('rechercher');
        }
        if(!empty($img)){
            $exist = true;
            $query = $em->createQuery(
                'SELECT g FROM AmicaleBundle:Galerie g WHERE g.glrImg = :img'
            )->setParameter('img', $img);
            $galerie = $query->getResult();

        }
        return $this->render('AmicaleBundle:Galerie:index.html.twig',array('galeries'=>$result,"galerie" => $galerie,"exist" =>$exist));


    }


    function indexUserAction(Request $request){

        $em=$this->getDoctrine()->getManager();
        $galeries=$em->getRepository("AmicaleBundle:Galerie")->findAll();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator  = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $galeries,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)
        );

        //return $this->render('AmicaleBundle:Galerie:index.html.twig',array('galeries'=>$result));
        $galerie = 'x';
        $exist = false;
        //DQL
        if($request->isMethod('GET'))
        {
            $img = $request->get('rechercher');
        }
        if(!empty($img)){
            $exist = true;
            $query = $em->createQuery(
                'SELECT g FROM AmicaleBundle:Galerie g WHERE g.glrImg = :img'
            )->setParameter('img', $img);
            $galerie = $query->getResult();

        }
        return $this->render('AmicaleBundle:Galerie:indexUser.html.twig',array('galeries'=>$result,"galerie" => $galerie,"exist" =>$exist));


    }


    function rechercheAction(Request $request){


        /*DQL*/
        $em = $this->getDoctrine()->getManager();
        //if($request -> isMethod('POST'))
        $img = $request->get('rechercher');
        $query = $em->createQuery(
            'SELECT g FROM AmicaleBundle:Galerie g WHERE g.glrImg ='.$img
        );

        $galerie = $query->getResult();

        /********************************/

        return $this->render('AmicaleBundle:Galerie:recherche.html.twig',
            array("galerie"=>$galerie));
        // return $this ->render('AmicaleBundle:Reservation:index.html.twig');
        /*****/



        $em=$this->getDoctrine()->getManager();
        $galeries=$em->getRepository("AmicaleBundle:Galerie")->findAll();
        return $this->render('AmicaleBundle:Galerie:index.html.twig',array('galeries'=>$galeries));

    }
    public function createAction(Request $request)
    {

        /************ UPLODE ************/
        /**
         * @Route("/product/new", name="app_product_new")
         */
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file

            $file = $galerie->getGlrImg();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // $fileName = 'taswira.png';
            // Move the file to the directory where img are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );

            // Update the 'img' property to store the img file name
            // instead of its contents
            $galerie->setGlrImg($fileName);
            $galerie->setGlrnbr(1);


            // ... persist the $product variable or any other work

            $em = $this->getDoctrine()->getManager();
            $em->persist($galerie);
            $em->flush();

            return $this->redirect($this->generateUrl('Create_Galerie'));
        }

        return $this->render('AmicaleBundle:Galerie:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function deleteAction($id){
        $em=$this->getDoctrine()->getManager();
        $gal=$em->getRepository('AmicaleBundle:Galerie')->find($id);
        $em->remove($gal);
        $em->flush();
        return $this->redirectToRoute('Acceuil_Galerie');
    }
    public function updateAction(Request $request,$glrId){
        $em=$this->getDoctrine()->getManager();
        $gal=$em->getRepository('AmicaleBundle:Galerie')->find($glrId);
        $form = $this->createForm(GalerieType::class, $gal);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gal);
            $em->flush();
            return $this->redirectToRoute('/ListGalerie');
        };
        return $this->render('Amicale::update', array('form' => $form->createView()));
    }
    public function rechercheXAction(Request $request){
        $gal=new Galerie();
        $em=$this->getDoctrine()->getManager();
        $form=$this->createForm(rechercheGalerieForm::class,$gal);
        $form->handleRequest($request);
        if($form->isValid()){
            $gal=$em->getRepository("Galerie")->findBy(array('glrId'=>$gal->getglrId()));

        }else{
            $gal=$em->getRepository("Galeriie")->findAll();
        }
        return $this->render("Amicale::recherche",array('Form'=>$form->createView(),'Galeries'=>$gal));
    }
}