<?php

namespace BES\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends \SKCMS\CoreBundle\Form\PageType
{
    
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
         parent::buildForm($builder, $options);
        $builder
            ->add('subtitle',null,['required'=>false])
            ->add('summary',null,['required'=>false])
            ->add('content','ckeditor',['required'=>false])
            ->add('picture',new \SKCMS\CoreBundle\Form\SKImageType(),['required'=>false])
            ->add('menu')
            
            
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BES\CoreBundle\Entity\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bes_corebundle_page';
    }
}
