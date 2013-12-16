<?php
/**
 * Created by PhpStorm.
 * User: omidnematollahi
 * Date: 12/16/13
 * Time: 2:02 AM
 */

namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\user;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class ManagerController extends Controller {

    public function managerAction()
    {
        return $this->render('EduEleraningBundle:Manager:main.html.twig');
    }

    public function addteacherAction(Request $request)
    {
        $user = new user();
        $user->setFname('Write a blog post');
        $user->setLname('6543');
        $user->setPhone('safaef');
        $user->setMelicode('65126');

        $form = $this->createFormBuilder($user)
            ->add('fname', 'text')
            ->add('lname', 'text')
            ->add('phone', 'text')
            ->add('melicode', 'text')
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('t_main'));
        }
        return $this->render('EduEleraningBundle:Manager:addteacher.html.twig',array('form' => $form->createView()));
    }

} 