<?php
/**
 * Created by PhpStorm.
 * User: omidnematollahi
 * Date: 12/16/13
 * Time: 2:02 AM
 */

namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\grouplesson;
use Edu\EleraningBundle\Entity\lesson;
use Edu\EleraningBundle\Entity\user;
use Edu\EleraningBundle\Form\grouplessonType;
use Edu\EleraningBundle\Form\lessonType;
use Edu\EleraningBundle\Form\Type\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class ManagerController extends Controller {

    public function managerAction()
    {
        return $this->render('EduEleraningBundle:Manager:main.html.twig');
    }

    public function addteacherAction(Request $request)
    {
        $teacher = new user();
        $teacher->setUniversity($this->getUser()->getUniversity());
        $teacher->addRole("ROLE_TEACHER");

        $form = $this->createForm(new RegistrationFormType('Edu\EleraningBundle\Entity\user'),$teacher)
            ->add('submit', 'submit', array('label' => 'ثبت'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);
            $em->flush();
            return $this->redirect($this->generateUrl('m_main'));
        }
        return $this->render('EduEleraningBundle:Manager:addteacher.html.twig',array('form' => $form->createView()));
    }

    public function showTeachersAction()
    {
        $em= $this->getDoctrine()->getEntityManager();

        $qb= $em->createQueryBuilder()
            ->select("u")
            ->from("EduEleraningBundle:user","u")
            ->where("u.roles LIKE :role")->setParameter("role","%ROLE_TEACHER%")
            ->andWhere("u.university = :uni")->setParameter("uni",$this->getUser()->getUniversity());

        $teachers = $qb->getQuery()->getResult();

        return $this->render('EduEleraningBundle:Manager:showteachers.html.twig',array('teachers' => $teachers));
    }

    public function showGroupsAction()
    {
        $em= $this->getDoctrine()->getEntityManager();

        $groups = $em->getRepository("EduEleraningBundle:grouplesson")->findBy(array("university"=>$this->getUser()->getUniversity()));

        return $this->render('EduEleraningBundle:Manager:showGroups.html.twig',array('groups' => $groups));
    }

    public function showlessonsAction($groupid)
    {
        $em= $this->getDoctrine()->getEntityManager();

        $group = $em->getRepository("EduEleraningBundle:grouplesson")->find($groupid);

        $lessons = $em->getRepository("EduEleraningBundle:lesson")->findBy(array("grouplesson"=>$group));

        return $this->render('EduEleraningBundle:Manager:showlessons.html.twig',array('lessons' => $lessons));
    }

    public function addGroupAction(Request $request)
    {
        $group = new grouplesson();
        $group->setUniversity($this->getUser()->getUniversity());

        $form = $this->createForm(new grouplessonType(),$group)
            ->add('submit', 'submit', array('label' => 'ثبت'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();
            return $this->redirect($this->generateUrl('m_main'));
        }
        return $this->render('EduEleraningBundle:Manager:addgroup.html.twig',array('form' => $form->createView()));
    }

    public function addLessonAction(Request $request)
    {
        $lesson = new lesson();

        $form = $this->createForm(new lessonType($this->getUser()->getUniversity()),$lesson)
            ->add('submit', 'submit', array('label' => 'ثبت'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $em = $this->getDoctrine()->getManager();
            $em->persist($lesson);
            $em->flush();
            return $this->redirect($this->generateUrl('m_main'));
        }
        return $this->render('EduEleraningBundle:Manager:addlesson.html.twig',array('form' => $form->createView()));
    }
} 