<?php

namespace Edu\EleraningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class postType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject')
            ->add('text')
            ->add('file')
            ->add('type')
            ->add('public')
            ->add('useres')
            ->add('lessones')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edu\EleraningBundle\Entity\post'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edu_eleraningbundle_post';
    }
}
