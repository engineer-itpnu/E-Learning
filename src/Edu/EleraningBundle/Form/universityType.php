<?php

namespace Edu\EleraningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class universityType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array("label"=>"نام دانشگاه"))
            ->add('phone',null,array("label"=>"تلفن"))
            ->add('website',null,array("label"=>"وب سایت"))
            ->add('enddate',null,array("label"=>"تاریخ انقضا"))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Edu\EleraningBundle\Entity\university'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edu_eleraningbundle_university';
    }
}
