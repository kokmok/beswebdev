<?php

namespace SKCMS\UserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAdminUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('create:user:admin')
            ->setDescription('Cree le premier utilisateur')
//            ->addArgument('name', InputArgument::OPTIONAL, 'Qui voulez vous saluer??')
//            ->addOption('yell', null, InputOption::VALUE_NONE, 'Si définie, la tâche criera en majuscules')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $container = $this->getContainer();
        $em = $container->get('doctrine')->getManager();
        
        $user = new \SKCMS\UserBundle\Entity\User();
        $user->setEmail('jona@solid-kiss.be')
            ->setPlainPassword('skBasePass')
            ->addRole(\SKCMS\UserBundle\Entity\User::ROLE_SUPER_ADMIN)
            ->setEnabled(true)
            ->setUsername('Jona')
            ->setFirstName('Jonathan')
            ->setLastName('Jonathan')
                ;
        
        
       $em->persist($user);
       $em->flush();

        $output->writeln(' user created with success');
    }
}