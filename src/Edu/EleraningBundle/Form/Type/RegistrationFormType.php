<?php
namespace Edu\EleraningBundle\Form\Type;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('fname')
            ->add('lname')
            ->add('phone')
            ->add('melicode')
        ;
    }

    public function getName()
    {
        return 'edu_user_registration';
    }
}
