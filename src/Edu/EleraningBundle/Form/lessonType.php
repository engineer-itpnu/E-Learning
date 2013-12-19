<?php

namespace Edu\EleraningBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class lessonType extends AbstractType
{
    private $uni;

    public function __construct($_uni)
    {
        $this->uni= $_uni;
    }


        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $university = $this->uni;
        $builder
            ->add('name',null,array('label'=>'نام درس'))
            ->add('explaination',null,array('label'=>'توضیح'))
            ->add('password',null,array('label'=>'رمز ثبت نام'))
            ->add('grouplesson',null,array(
                    'label'=>'گروه درسی',
                    'property' => 'name',
                    'query_builder' => function (EntityRepository $er) use ($university) {
                            return $er->createQueryBuilder('u')->where("u.university = :uni")->setParameter('uni', $university);
                        }))
            ->add('teacher',null,array(
                    'label'=>'استاد',
                    'query_builder' => function (EntityRepository $er) use ($university) {
                            return $er->createQueryBuilder('u')
                                ->where("u.university = :uni")->setParameter('uni', $university)
                                ->andWhere("u.roles LIKE :role")->setParameter("role","%ROLE_TEACHER%");
                        }));
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
