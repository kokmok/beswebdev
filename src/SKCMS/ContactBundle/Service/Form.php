<?php

/**
 * Description of Form
 *
 * @author Jona
 */


namespace SKCMS\ContactBundle\Service;



use Symfony\Component\Form\FormFactoryInterface;
use Twig_Environment;
use Symfony\Component\DependencyInjection\Container;


class Form 
{
    private $formFactory;
    private $twig;
    private $container;
    private $request;
    private $message;
    private $form;
    private $session;
    private $em;
    private $formSent = false;
    private $router;
    private $response;
    
    
    public function __construct(FormFactoryInterface $formFactory, \Twig_Environment $twig,Container $container)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->container = $container;
        $this->request = $this->container->get('request');
        $doctrine = $this->container->get('doctrine');
        $this->em = $doctrine->getManager();
        $this->session = $container->get('session');
        $this->router = $container->get('router');
        
    }
    
    /*
     * return FormView
     */
    public function get()
    {
        $this->createContactForm();
        $this->analyseRequest();
        return $this->createContactFormView();
    }
    
    public function createForm()
    {
        $entityClass = $this->container->getParameter('skcms.contact.entity');
        $this->contactMessage = new $entityClass;
        
        $formClass = $this->container->getParameter('skcms.contact.form_type');
        $this->form = $this->formFactory->create(new $formClass,$this->contactMessage);

    }
    
    
    private function createContactFormView()
    {

        if ($this->response === null)
        {
            return $this->twig->render('SKCMSContactBundle:Form:contact-form.html.twig',['contactForm'=>$this->form->createView(),'formSent'=>$this->formSent]);
        }
        else
        {
            return $this->response;
        }
        
        
       
    }
    
    
    private function createContactForm()
    {
        
        $entityClass = $this->container->getParameter('skcms.contact.entity');
            $this->message = new $entityClass;
        
        $formClass = $this->container->getParameter('skcms.contact.form_type');
        $this->form = $this->formFactory->create(new $formClass,$this->message);
        
        
    }
    
    
    private function analyseRequest()
    {
        if ($this->request->getMethod() == 'POST') 
        {
          
            $this->form->bind($this->request);
          
            if ($this->form->isValid()) 
            {
                $this->em->persist($this->message);
                $this->em->flush();
                $this->sendNotificationMails();
                $this->session->getFlashBag()->add(
                  'skcms_contact',
                  'skcms_contact_message_sent'
                  );
                $this->formSent = true;
                
                $url = $this->router->generate($this->request->get('_route'),$this->request->get('_route_params'));
                
                $this->response =  new \Symfony\Component\HttpFoundation\RedirectResponse($url);
//                return $this->router->redirect($url);
              
            }
            else
            {
                $this->session->getFlashBag()->add(
                'skcms_contact',
                'skcms_contact_message_not_sent'
                );
                $this->formSent = false;
            }
            
            
        }
    }
    
    private function sendNotificationMails()
    {
        
        if ($this->container->getParameter('skcms.contact.email_notification.enabled'))
        {
            $message = \Swift_Message::newInstance()
                ->setSubject($this->container->getParameter('skcms.contact.email_notification.subject'))
                ->setFrom($this->container->getParameter('mailer_user'))
                ->setTo($this->container->getParameter('skcms.contact.email_notification.target'))
                ->setBody(
                    $this->twig->render(
                        'SKCMSContactBundle:Email:emailNotification.html.twig',['SKCMS_Contact_messageLink'=>$this->container->get('router')->generate('sk_admin_messageview', ['id'=>$this->message->getId()],true)]
                    )
                    , 'text/html'
                )
            ;
            $this->container->get('mailer')->send($message);

        }        
    }
    
    
}
