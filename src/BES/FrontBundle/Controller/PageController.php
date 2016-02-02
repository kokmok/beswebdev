<?php
namespace BES\FrontBundle\Controller;

use SKCMS\FrontBundle\Controller\PageController as BaseController;
/**
 * Description of PageController
 *
 * @author jona
 */
class PageController extends BaseController
{
    public function setCustomTemplateParams() {
        parent::setCustomTemplateParams();
        if ($this->page->getTemplate() !== null && $this->page->getTemplate()->getFile() === 'contact')
        {
            $contactForm = $this->get('skcms.contact.form')->get();
            $this->addTemplateParam('contactForm', $contactForm);
            if ($contactForm instanceof \Symfony\Component\HttpFoundation\Response)
            {
                $this->forceResponse = $contactForm;
            }
            
        }
        
    }
}
