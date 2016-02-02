<?php

namespace SKCMS\ContactBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('skcms_contact');
        $rootNode   ->children()
                    ->scalarNode('entity')->end()
                    ->scalarNode('form_type')->end()
                    ->arrayNode('email_notification')
                        ->children()
                            ->booleanNode('enabled')
                                ->defaultValue(true)
                            ->end()
                            ->scalarNode('subject')
                                ->defaultValue('SKCMS_Contact_Subject')
                            ->end()
                            ->arrayNode('target')
                                ->prototype('scalar')

                            ->end()
                        ->end()
                    ->end()
                ;

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
