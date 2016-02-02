<?php

namespace SKCMS\ContactBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class SKCMSContactExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
//        die('<pre>'.print_r($config,true).'</pre>');
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        

        
        $container->setParameter('skcms.contact.entity', $config['entity']);
        $container->setParameter('skcms.contact.form_type', $config['form_type']);
        $container->setParameter('skcms.contact.email_notification.subject', $config['email_notification']['subject']);
        $container->setParameter('skcms.contact.email_notification.enabled', $config['email_notification']['enabled']);
        $container->setParameter('skcms.contact.email_notification.target', $config['email_notification']['target']);
        
//        die(print_r($container->getParameter('skcms.contact.entity')));
    }
}
