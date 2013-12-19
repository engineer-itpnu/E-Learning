<?php

namespace Edu\EleraningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class grouplessonType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array('label'=>'نام گروه'))
            ->add('explaination',null,array('label'=>'توضیح'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edu\EleraningBundle\Entity\grouplesson'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edu_eleraningbundle_grouplesson';
    }
}
