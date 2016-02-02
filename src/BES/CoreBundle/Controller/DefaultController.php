<?php

namespace BES\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BESCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
