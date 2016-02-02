<?php

namespace BES\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BESContactBundle:Default:index.html.twig', array('name' => $name));
    }
}
