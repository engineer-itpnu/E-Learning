<?php
namespace Edu\EleraningBundle\Form\Type;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegisterFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('fname',null,array("label"=>"نام"))
            ->add('lname',null,array("label"=>"نام خانوادگی"))
            ->add('phone',null,array("label"=>"تلفن"))
            ->add('melicode',null,array("label"=>"کدملی"))
        ;
    }

    public function getName()
    {
        return 'edu_user_registration';
    }
}
