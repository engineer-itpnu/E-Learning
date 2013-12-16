<?php

namespace Edu\EleraningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class lessonType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('explaination')
            ->add('password')
            ->add('grouplesson')
            ->add('studentlesson')
            ->add('teacherid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edu\EleraningBundle\Entity\lesson'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edu_eleraningbundle_lesson';
    }
}
