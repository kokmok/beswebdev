<?php

namespace BES\FrontBundle\Controller;

use SKCMS\FrontBundle\Controller\HomeController as BaseController;

class HomeController extends BaseController
{
    
    protected function setCustomTemplateParams()
    {
        
        $slugUtils = $this->get('skcms_core.slugutils');
        $page = $slugUtils->getPageBySlug('home',$this->locale);
        
        $this->addTemplateParam('page', $page);
        
        $menuUtils = $this->get('skcms_core.menuutils');
        $boxes = $menuUtils->getMenu('homeboxes',false);
        
        $this->addTemplateParam('boxes', $boxes);
        
        
        

        
        
        
    }
    
}
