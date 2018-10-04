<?php
/**
 * Created by PhpStorm.
 * User: wiem
 * Date: 12/03/2017
 * Time: 14:45
 */

namespace AmicaleBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AntiMattr\GoogleBundle\Maps\StaticMap;
use AntiMattr\GoogleBundle\Maps\Marker;

class UserController extends  Controller
{
    public function indexAction()
    {
        $map = new StaticMap();
        $map->setId("Paul");
        $map->setSize("512x512");
        $marker = new Marker();
        $marker->setLatitude(40.596631);
        $marker->setLongitude(-73.972359);
        $map->addMarker($marker);
        $this->container->get('google.maps')->addMap($map);
// API Key : AIzaSyBfjXFt5EnZ4WFJVinfMCCkCbX6lJvIV7g
        return $this->render('AmicaleBundle:User:index.html.twig');
    }

}