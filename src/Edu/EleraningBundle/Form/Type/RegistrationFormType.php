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
            ->add('roles','choice', array('choices' => array('ROLE_ADMIN' => 'مدیر سایت', 'ROLE_MANAGER' => 'مدیر داشگاه', 'ROLE_STUDENT' => 'دانشجو', 'ROLE_TEACHER' => 'استاد'),
                'multiple'  => true,))
        ;
    }

    public function getName()
    {
        return 'edu_user_registration';
    }
}
