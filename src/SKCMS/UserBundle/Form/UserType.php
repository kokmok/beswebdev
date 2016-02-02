<?php

namespace SKCMS\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    
    private $editor;
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    
    public function __construct(\SKCMS\UserBundle\Entity\User $editor)
    {
        $this->editor = $editor;
    }
    
    
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $roles = array('ROLE_USER'=>'Utilisateur','ROLE_ADMIN'=>'Admin');
//        die(print_r($this->editor->getRoles()));
//        if (in_array('ROLE_SUPER_ADMIN', $this->editor->getRoles()))
//        {
            $roles['ROLE_SUPER_ADMIN']='Super Admin';
//        }
        
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('enabled','checkbox',array('required' => false))
            ->add('locked','checkbox',array('required' => false))
            ->add('roles','choice',array(
                'choices'   => $roles,
                'multiple'  => true
                ))
            ->add('username')
            ->add('email')
            ->add('plainPassword','repeated',array('type' => 'password','first_options'  => array('attr' => array('placeholder' => 'Your New Password')),
    'second_options' => array('attr' => array('placeholder' => 'Confirm New Password'))));
            ;
//        
//        $builder
//            ->add('username')
////            ->add('usernameCanonical')
////            ->add('email')
////            ->add('emailCanonical')
////            ->add('enabled')
////            ->add('salt')
////            ->add('password')
////            ->add('lastLogin')
//            ->add('locked')
////            ->add('expired')
////            ->add('expiresAt')
////            ->add('confirmationToken')
////            ->add('passwordRequestedAt')
//            ->add('roles')
////            ->add('credentialsExpired')
////            ->add('credentialsExpireAt')
//            ->add('firstName')
//            ->add('lastName')
//        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SKCMS\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'skcms_userbundle_user';
    }
}
