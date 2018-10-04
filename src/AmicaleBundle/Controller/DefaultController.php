<?php

namespace AmicaleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AmicaleBundle:Default:index.html.twig');
    }
}
