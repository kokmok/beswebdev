<?php

namespace SKCMS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SKCMSUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
