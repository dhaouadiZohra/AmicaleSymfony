<?php
/**
 * Created by PhpStorm.
 * User: oussa
 * Date: 4/10/2017
 * Time: 3:35 AM
 */

namespace AmicaleBundle\Controller;

use AmicaleBundle\Entity\Commentaire;
use AmicaleBundle\Form\ModifierCommentaireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AmicaleBundle\Form\CommentaireType;


class CommentController
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function supprimerCommentAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $Comment=$em->getRepository('AmicaleBundle:Comment')->find($id);
        $Activite=$Comment->getIdActivite();
        $em->remove($Comment);
        $em->flush();

        return $this->redirectToRoute('Amicale_ConsulterActivite',array('idActivite'=>$Activite->getId()));
    }

    public function modifierCommentAction(Request $request,$id)
    {


        $em=$this->getDoctrine()->getManager();
        $Comment=$em->getRepository('AmicaleBundle:Comment')->find($id);
        $idActivite=$Comment->getIdActivite();
        $formModifier=$this->createForm(ModifierCommentType::class,$Comment);
        $formModifier->handleRequest($request);
        if($formModifier->isValid())
        {
            $em->persist($Comment);
            $em->flush();
            return $this->redirectToRoute('Amicale_ConsulterActivite',array('idActivite'=>$idActivite->getId()));
        }
        return $this->render('AmicaleBundle:Comment:ModifierComment.html.twig',array("idComment"=>$id,
            'formModifier'=>$formModifier->createView()));

    }
    public function AdminGestionCommentAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $Comments=$em->getRepository('AmicaleBundle:Comment')->findAll();
        $CommentSignale=array();

        foreach ($Comments as $value)
        {
            if ($value->getNbrSignale()!=0)
            {
                array_push($CommentSignale,$value);
            }
        }

        /*foreach ($CommentaireSignale as $value)
        {
            $iduser=$value->getIdUser();
            $idannonce=$value->getIdAnnonce();
            $user = $em->getRepository('UserBundle:User')->find($iduser);
                array_push($CommentaireSignaleUser,$user);
            $annonce = $em->getRepository('HostGuestBundle:Annonce')->find($idannonce);
                array_push($CommentaireSignaleAnnonce,$annonce);

        }*/
        if($request->isMethod('POST'))
        {
            $idcom = $request->get('idcom');
            $CommentSignale = $em->getRepository('')->findBy(array("idcom"=>$idcom));
        }

        $users = $em->getRepository('AmicaleBundle:User')->findAll();
        $activites = $em->getRepository('AmicaleBundle:Activite')->findAll();







        return $this->render('AmicaleBundle:Comment:AdminGestionComment.html.twig',array('CommentSignale'=>$CommentSignale,
            'users'=>$users,
            'activites'=>$activites
        ));

    }

    public function SignalerCommentAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $Comment=$em->getRepository('AmicaleBundle:Comment')->find($id);
        $idActivite=$Comment->getIdActivite()->getId();
        $nombresignale=$Comment->getNbrSignale()+1;
        $Comment->setNbrSignale($nombresignale);

        $em->persist($Comment);
        $em->flush();

        return $this->redirectToRoute('Amicale_ConsulterActivite',array('idActivite'=>$idActivite));

    }
    public function RechercherCommentSignaleAction()
    {

        $em=$this->getDoctrine()->getManager();
        $Comments=$em->getRepository('AmicaleBundle:Comment')->findAll();
        $CommentSignale=array();

        foreach ($Comments as $value)
        {
            if ($value->getNbrSignale()!=0)
            {
                array_push($CommentSignale,$value);
            }
        }

        /*if($Request->isMethod('POST'))
        {
            $rechercher = $Request->get('iduser');
            $CommentaireSignale = $em->getRepository('')->findBy(array('iduser'=>$rechercher));
        }*/
        $users = $em->getRepository('AmicaleBundle:User')->findAll();
        $activites = $em->getRepository('AmicaleBundle:Activite')->findAll();

        return $this->render('AmicaleBundle:Activite:AdminGestionComment.html.twig',array('CommentSignale'=>$CommentSignale,
            'users'=>$users,
            'activites'=>$activites));

    }
    function CommenterAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user=$this->get("security.token_storage")->getToken()->getUser();
        $activite = $em->getRepository('AmicaleBundle:Activite')->find($id);
        $UsersCommenter=array($user);

        $Comment = new Comment();
        /*   $formCommenter=$this->createForm(CommentaireType::class,$Commentaire);
           $formCommenter->handleRequest($request);*/
        $Comment->setIdActivite($activite);
        $Comment->setIdUser($user);
        $Comment->setContenu($_POST['contenu']);
        /*
        if($formCommenter->isValid())
        {
*/
        $em->persist($Comment);
        $em->flush();
        $CommentsCetteActivite = $em->getRepository('AmicaleBundle:Comment')->findBy(array("idActivite" => $activite));
        $UsersCommenter=array($user);

        $afficherCommenterAfficher=true;
        $currentDate=new \DateTime("now");
        /*var_dump($currentDate);
        var_dump($annonce->getDateFin());*/
        if ($currentDate>$activite->getDateFin())
        {
            $afficherCommenterAfficher=false;
        }


        foreach ($CommentsCetteActivite as $value) {
            $User=$value->getIdUser();
            $idUser=$User->getId();
            $UserCommenter = $em->getRepository('AmicaleBundle:User')->find($idUser);
            if (!in_array($UserCommenter,$UsersCommenter))
            {
                array_push($UsersCommenter, $UserCommenter);
            }
        }
        $CommentsCetteActivite = $em->getRepository('AmicaleBundle:Comment')->findBy(array("idActivite" => $activite));
        return $this->render('AmicaleBundle:Comment:actualiserComment.html.twig',array('idActivite'=>$activite->getId(),
            'actualUser'=>$user,
            'Comments'=>$CommentsCetteActivite,
            'Users'=>$UsersCommenter,
            'afficher'=>$afficherCommenterAfficher
        ));
        /*  }

          return $this->render('HostGuestBundle:Commentaire:Commenter.html.twig',array('idAnnonce'=>$annonce->getId(),
              'formCommenter'=>$formCommenter->createView()));*/
    }

    function AfficherCommentsAction($id)
    {
        $user=$this->get("security.token_storage")->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository('AmicaleBundle:Activite')->find($id);

        $CommentsCetteActivite = $em->getRepository('AmicaleBundle:Comment')->findBy(array("idActivite" => $activite));
        $UsersCommenter=array($user);

        $afficherCommenterAfficher=true;
        $currentDate=new \DateTime("now");
        /*var_dump($currentDate);
        var_dump($activite->getDateFin());*/
        if ($currentDate>$activite->getDateFin())
        {
            $afficherCommenterAfficher=false;
        }


        foreach ($CommentsCetteActivite as $value) {
            $User=$value->getIdUser();
            $idUser=$User->getId();
            $UserCommenter = $em->getRepository('UserBundle:User')->find($idUser);
            if (!in_array($UserCommenter,$UsersCommenter))
            {
                array_push($UsersCommenter, $UserCommenter);
            }
        }

        /*foreach ($UsersCommenter as $value) {
            var_dump($value->getId());
        }*/
        return $this->render('AmicaleBundle:Comment:AfficherComments.html.twig',array('idActivite'=>$activite->getId(),
            'actualUser'=>$user,
            'Comments'=>$CommentsCetteActivite,
            'Users'=>$UsersCommenter,
            'afficher'=>$afficherCommenterAfficher
        ));

    }
}