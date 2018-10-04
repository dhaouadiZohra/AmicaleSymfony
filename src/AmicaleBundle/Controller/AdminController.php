<?php
/**
 * Created by PhpStorm.
 * User: wiem
 * Date: 12/03/2017
 * Time: 16:38
 */

namespace AmicaleBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('AmicaleBundle:Admin:index.html.twig');
    }
}