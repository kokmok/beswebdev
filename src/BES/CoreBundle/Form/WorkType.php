<?php

namespace BES\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkType extends \SKCMS\CoreBundle\Form\EntityType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	parent::buildForm($builder, $options);
        $builder
            ->add('title')
            ->add('student')
            ->add('link')
            ->add('tags')
            ->add('content','ckeditor')
            ->add('picture',new \SKCMS\CoreBundle\Form\SKImageType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BES\CoreBundle\Entity\Work'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bes_corebundle_work';
    }
}
