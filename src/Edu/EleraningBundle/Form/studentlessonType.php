<?php

namespace Edu\EleraningBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class studentlessonType extends AbstractType
{
    private $user;

    public function __construct($_user)
    {
        $this->user= $_user;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->user;
        $builder
            ->add('lessones','entity',array(
                    'class'=>'Edu\EleraningBundle\Entity\lesson',
                    'label'=>'نام درس',
                    'property' => 'name',
                    'query_builder' => function (EntityRepository $er) use ($user) {
                            return $er->createQueryBuilder('u')
                                    ->innerJoin('u.grouplesson','g')
                                    ->where("g.university = :uni")->setParameter('uni', $user->getUniversity())
                                    ->andWhere('u NOT IN ('.
                                        $er->createQueryBuilder('u1')
                                        ->innerJoin("u1.studentlesson","sl")
                                        ->where("sl.useres = :user")
                                        ->getDQL()
                                    .')')->setParameter('user',$user);
                        }))
            ->add('password','password',array('label'=>'رمز ثبت نام'))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'edu_eleraningbundle_studentlesson';
    }
}
