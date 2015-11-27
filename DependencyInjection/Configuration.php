<?php

namespace MailMotor\Bundle\MailMotorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mailmotor');

        $rootNode
            ->children()
                ->scalarNode('service')->isRequired()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
