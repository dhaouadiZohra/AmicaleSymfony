<?php

namespace MailBundle\Controller;

use MailBundle\Entity\Mail;
use MailBundle\Form\MailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function indexAction()
    {
        return $this->render('MailBundle:Mail:mail.html.twig', array());
    }

    public function sendMailAction(Request $request)
    {

        $to = "esprit.amical@gmail.com";
        $mail = new Mail();
        $form = $this->createForm(MailType::class,$mail);
                $form -> handleRequest($request);

        
        if ($request->getMethod() == 'POST') {
          
            if ($form->isValid()) {
                
                $message = \Swift_Message::newInstance()
                    ->setSubject($mail->getNom())
                    ->setFrom($mail->getFrom())
                    ->setTo($to)
                    ->setBody($mail->getText());
                $this->get('mailer')->send($message);
                return $this->render('MailBundle:Mail:mail.html.twig', array('to' => $to,
                    'from' => $mail->getFrom()
                ));
            }
        }
//return new response();      
  return $this->redirect($this->generateUrl('my_app_mail_form'));
    }

    public function newAction(Request $request)
    {
        $mail = new Mail();
        $form = $this->createForm(MailType::class,$mail);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $this->sendMailAction('esprit.amical@gmail.com', $mail->getFrom(), $mail ->getNom(), $mail->getText());

 }
        }
        return $this->render('MailBundle:Mail:new.html.twig', array('form' => $form->createView()));
            }
}
