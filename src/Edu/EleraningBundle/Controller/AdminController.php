<?php
/**
 * Created by PhpStorm.
 * User: omidnematollahi
 * Date: 12/16/13
 * Time: 1:03 AM
 */

namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\university;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller {

    public function adminAction()
    {
        return $this->render('EduEleraningBundle:Admin:adminmain.html.twig');
    }

    public function addmanagerAction(Request $request)
    {
        $uni = new university();
        $uni->setName('Write a blog post');
        $uni->setPhone('6543');
        $uni->setWebsite('safaef');
        $uni->setEnddate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($uni)
            ->add('name', 'text')
            ->add('phone', 'text')
            ->add('website', 'text')
            ->add('enddate', 'date')
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $em = $this->getDoctrine()->getManager();
            $em->persist($uni);
            $em->flush();
            return $this->redirect($this->generateUrl('m_main'));
        }
        return $this->render('EduEleraningBundle:Admin:addmanager.html.twig',array('form' => $form->createView()));
    }

} 