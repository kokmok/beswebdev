<?php

namespace BES\ContactBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactMessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('date')
//            ->add('status')
            ->add('email','email',array(
                'required'=>true,
            'constraints' => [
                new \Symfony\Component\Validator\Constraints\Email(),
                new \Symfony\Component\Validator\Constraints\NotBlank()
                ],
   ))
//            ->add('phone')
            ->add('name','text',['required'=>true,'constraints'=>new \Symfony\Component\Validator\Constraints\NotBlank()])
//            ->add('fax')
//            ->add('subject')
            ->add('message','textarea',['required'=>true,'constraints'=>new \Symfony\Component\Validator\Constraints\NotBlank()])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BES\ContactBundle\Entity\ContactMessage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bes_contactbundle_contactmessage';
    }
}
