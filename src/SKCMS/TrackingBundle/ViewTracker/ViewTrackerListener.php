<?php

namespace SKCMS\TrackingBundle\ViewTracker;

/**
 * Description of ViewTrackerListener
 *
 * @author Jona
 */
class ViewTrackerListener 
{
    
    private $container;
    private $route;
    private $routeParams;
    private $request;
    private $session;
    private $security;
    private $user;
    private $em; 
    private $trueSession;
    private $responseAdapter;
    private $view;
    
    
    public function __construct($container,  \Symfony\Component\Security\Core\SecurityContext $context, \SKCMS\TrackingBundle\ViewTracker\ResponseAdapter $responseAdapter)
    {
        $this->container = $container;
        $this->security = $context;
        $this->em = $this->container->get('doctrine')->getManager();
        
        $this->responseAdapter = $responseAdapter;
    }
    
    
    public function onKernelRequest(\Symfony\Component\HttpKernel\Event\GetResponseEvent $event)
    {
        if ($event->getRequestType() == \Symfony\Component\HttpKernel\HttpKernelInterface::SUB_REQUEST)
        {
            return ;
        }
        if ($event->getRequest()->isXmlHttpRequest())
        {
            return ;
        }
        $this->user = $this->security->getToken()->getUser();
        if ($this->security->isGranted('ROLE_ADMIN'))
        {
            return;
        }
        
        $this->request = $event->getRequest();
    
        $this->trueSession = $this->request->getSession();
        $this->route = $this->request->get('_route');
        $this->routeParams = $this->request->get('_route_params');
        
        if (preg_match('#admin#', $this->route) || preg_match('#tracking#', $this->route)|| preg_match('#_wdt#', $this->route))
        {
            return;
        }
        
        $this->initSession();
        $this->initView();
        
        
    }
    public function onKernelController(\Symfony\Component\HttpKernel\Event\FilterControllerEvent $event)
    {
        if ($event->getRequestType() == \Symfony\Component\HttpKernel\HttpKernelInterface::SUB_REQUEST)
        {
            return ;
        }
        if ($event->getRequest()->isXmlHttpRequest())
        {
            return ;
        }
        $this->user = $this->security->getToken()->getUser();
        if ($this->security->isGranted('ROLE_ADMIN'))
        {
            return;
        }
        
        $controller = $event->getController();
        if (!preg_match('#FrontBundle#', get_class($controller[0])))
        {
           return;
        }
        
        
        $this->request = $event->getRequest();
    
        $this->trueSession = $this->request->getSession();
        $this->route = $this->request->get('_route');
        $this->routeParams = $this->request->get('_route_params');
        
        if (preg_match('#admin#', $this->route) || preg_match('#tracking#', $this->route)|| preg_match('#_wdt#', $this->route))
        {
            return;
        }
        
        $this->initSession();
        $this->initView();
        
        
    }
    
    
    public function adaptResponse(\Symfony\Component\HttpKernel\Event\FilterResponseEvent $event)
    {
        
        if (null !== $this->session)
        {
            $response = $this->responseAdapter->processAdaptation($event->getResponse(), $this->container->get('router')->generate('skcms_tracking_updater',['id'=>$this->view->getId()]));
            $event->setResponse($response);
        }
        
        
    }
    
    
    private function initSession()
    {
        if (null == $this->trueSession->get('SKSessionId'))
        {
            $this->createSession();
        }
        else
        {
            $sessionRepo = $this->em->getRepository('SKCMSTrackingBundle:Session');
            $this->session = $sessionRepo->find($this->trueSession->get('SKSessionId'));
            
        }
        
    }
    
    
    private function createSession()
    {
        $this->session = new \SKCMS\TrackingBundle\Entity\Session();
        $this->session->setIp($this->request->getClientIp());
        if ($this->user instanceof SKCMS\UserBundle\Entity\User)
        {
            $this->session->setUser($this->user);
        }
        
        $this->session->setReferrer($this->request->server->get('HTTP_REFERER'));
        
        $this->em->persist($this->session);
        $this->em->flush();
        
        $this->trueSession->set('SKSessionId',$this->session->getId());
    }
    
    
    private function initView()
    {
        $this->view = new \SKCMS\TrackingBundle\Entity\View();
        $this->view->setDatein(new \DateTime());
        $this->view->setDateOut(new \DateTime());
        $this->view->setRoute($this->route);
        $this->view->setRouteParams($this->routeParams);
        $this->view->setPath($this->container->get('router')->generate($this->route,$this->routeParams));
        $this->view->setLocale($this->request->getLocale());
        $this->view->setSession($this->session);
        
        $this->em->persist($this->view);
        $this->em->flush();
    }


    
}
