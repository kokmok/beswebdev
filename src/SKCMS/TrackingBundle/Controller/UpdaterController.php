<?php

namespace SKCMS\TrackingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpdaterController extends Controller
{
    public function updateAction($id)
    {
        $em  = $this->getDoctrine()->getManager();
        $viewRepo = $em->getRepository('SKCMSTrackingBundle:View');
        $view = $viewRepo->find($id);
        $view->setDateOut(new \DateTime());
        
        $em->persist($view);
        $em->flush();
        
        return new \Symfony\Component\HttpFoundation\Response('1');
        
    }
}
