<?php
/**
 * Created by PhpStorm.
 * User: Safa
 * Date: 26/03/2017
 * Time: 01:02
 */

namespace AmicaleBundle\Controller;


use AmicaleBundle\Entity\Publication;
use AmicaleBundle\Entity\Rating;
use AmicaleBundle\Form\PublicationForm;
use AmicaleBundle\Form\PublicationType;
use AmicaleBundle\Form\RatingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PublicationController extends Controller
{
    public function PubAction()
    {
        return $this->render('AmicaleBundle:Publication:Publication.html.twig');
    }
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $publication=$em->getRepository("AmicaleBundle:Publication")->findAll();
        /*$query = $em->createQuery(
         'SELECT o FROM AmicaleBundle:Offre o
          WHERE o.ofrDateDeb > CURRENT_DATE()'
    );
    $offre = $query->getResult();
    */
        return $this->render('AmicaleBundle:Publication:index.html.twig',
            array("publications"=>$publication));
    }

    public function listerAction($id,request $request)
    {

        // $User = $this->get('security.token_storage')->getToken()->getUser();
        //$iduser= $User->getId();
        $em=$this->getDoctrine()->getManager();

        $connection = $em->getConnection();
        $statement1 = $connection->prepare("SELECT p.PUB_ID, p.PUB_TITRE, p.PUB_OBJET, p.PUB_DATE, p.PUB_DESCRIPTION , p.PUB_SEC_ID,pv.user_id,pv.valeur,pv.nbr
                                            FROM publication p
                                            LEFT JOIN rating pv ON p.PUB_ID = pv.pub_id

                                            WHERE p.PUB_SEC_ID = :id ORDER BY p.PUB_ID 
                                            ");
        $statement1->bindValue('id', $id);
        $statement1->execute();
        $publications = $statement1->fetchAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $publications,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)
        );



        //$publications=$em->getRepository("AmicaleBundle:Publication")->findAll();
        return $this->render('AmicaleBundle:Publication:Publication.html.twig',array("publications"=>$result));



    }

    public function listerAdminAction($id, request $request)
    {
        // $User = $this->get('security.token_storage')->getToken()->getUser();
        //$iduser= $User->getUsername();
        $em=$this->getDoctrine()->getManager();

        $connection = $em->getConnection();
        $statement1 = $connection->prepare("SELECT p.PUB_ID, p.PUB_TITRE, p.PUB_OBJET, p.PUB_DATE, p.PUB_DESCRIPTION , p.PUB_SEC_ID,pv.user_id,pv.valeur,pv.nbr
FROM publication p
LEFT JOIN rating pv ON p.PUB_ID = pv.pub_id

WHERE p.PUB_SEC_ID = :id GROUP BY p.PUB_ID 
");


        $statement1->bindValue('id', $id);
        $statement1->execute();
        $publications = $statement1->fetchAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $publications,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)
        );



        //$publications=$em->getRepository("AmicaleBundle:Publication")->findAll();
        return $this->render('AmicaleBundle:Publication:PublicationAdmin.html.twig',array("publications"=>$result));



    }
    public function ajoutAction(Request $request,$id)
    {

        $publication=new Publication();
        $User = $this->get('security.token_storage')->getToken()->getUser();
        $iduser= $User->getUsername();
        if($request->isMethod('POST')){

            $publication->setPubTitre($request->get('titre'));
            $publication->setPubObjet($request->get('objet'));
            $publication->setPubDescription($request->get('desc'));
            $publication->setPubSecId($id);
            $em=$this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();



            return $this->redirectToRoute('Publications',array("id"=>$id,'username'=>$iduser));
        }

        return $this->render('AmicaleBundle:Publication:AjoutPublication.html.twig');

    }

    public function ajoutAdminAction(Request $request,$id)
    {

        $publication=new Publication();
        //$user= $this>$this->getDoctrine()->getUser()->getId();
        if($request->isMethod('POST')){

            $publication->setPubTitre($request->get('titre'));
            $publication->setPubObjet($request->get('objet'));
            $publication->setPubDescription($request->get('desc'));
            $publication->setPubSecId($id);
            //$publication->setPubUserId($user);
            $em=$this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();



            return $this->redirectToRoute('Publications_admin',array("id"=>$id));
        }

        return $this->render('AmicaleBundle:Publication:AjoutPublicationAdmin.html.twig');

    }

    public function updateavisAction(Request $request,$id,$ids)

    {
        $User = $this->get('security.token_storage')->getToken()->getUser();
        $iduser= $User->getId();

        $valeur=$request->get('valeur');
        //$valeu=$request->get('titre');
        $em=$this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT *
FROM rating 


WHERE pub_id = :id   ");
        $statement->bindValue('id', $id);
        $statement->execute();
        $rating = $statement->fetch();
        var_dump($rating); //test
        if (is_array($rating)){


            $statement1 = $connection->prepare("UPDATE `rating`  SET valeur = valeur + :val,nbr=nbr+1,user_id=$iduser WHERE `rating`.`pub_id` = :id 
    ");
            $statement1->bindValue('id', $id);
            $statement1->bindValue('val', $valeur);
            $statement1->execute();

            return $this->redirectToRoute('Publications',array("id"=>$ids));



        }else{$rating=new Rating();





            $rating->setValeur($valeur);
            $rating->setUser(2);
            $rating->setNombre(1);
            $rating->setPublication($id);
            $em=$this->getDoctrine()->getManager();
            $em->persist($rating);
            $em->flush();








            return $this->redirectToRoute('Publications',array("id"=>$ids));
        }




    }

    public function updateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $publication=$em->getRepository('AmicaleBundle:Publication')->find($id);
        $idd=$publication->getPubSecId();
        $form=$this->createForm(PublicationForm::class,$publication);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();
            return $this->redirectToRoute('Publications',array("id"=>$idd));
        }
        return $this->render('AmicaleBundle:Publication:updatepubAdmin.html.twig',array('form'=>$form->createView()));
    }

    public function deleteAction($id,$ids)
    {
        $em=$this->getDoctrine()->getManager();
        $publication=$em->getRepository('AmicaleBundle:Publication')->find($id);
        $em->remove($publication);
        $em->flush();
        return $this->redirectToRoute('Publications',array("id"=>$ids));
    }



}