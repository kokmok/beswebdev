<?php

namespace SKCMS\TrackingBundle\ViewTracker;

/**
 * Description of ResponseAdapter
 *
 * @author Jona
 */
class ResponseAdapter 
{
    
    private $twig;
    private $container;
    
    public function __construct($twig,$container)
    {
        $this->twig = $twig;
        $this->container = $container;
    }
    
    
    public function processAdaptation(\Symfony\Component\HttpFoundation\Response $response,$trkAjaxUrl)
    {
        $content = $response->getContent();
        
        $content = preg_replace('#(</body>)#', 
               
                '<script type="text/javascript" src="'.$this->container->get('templating.helper.assets')->getUrl('bundles/skcmstracking/js/trk.js').'"></script>'.
                '<script type="text/javascript">var trkAjaxUrl="'.$trkAjaxUrl.'";</script>'.
                '$1', 
                $content);
        
        $response->setContent($content);
        
        return $response;
        
        
    }
    
    
}
