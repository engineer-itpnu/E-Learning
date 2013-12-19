<?php
/**
 * Created by PhpStorm.
 * User: omidnematollahi
 * Date: 12/16/13
 * Time: 1:03 AM
 */

namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\university;
use Edu\EleraningBundle\Form\universityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller {

    public function adminAction()
    {
        return $this->render('EduEleraningBundle:Admin:adminmain.html.twig');
    }

    public function adduniversityAction(Request $request)
    {
        $uni = new university();

        $form = $this->createForm(new universityType(), $uni)
        ->add('submit', 'submit', array('label' => 'ثبت'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $uni->setRegdate(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($uni);
            $em->flush();
            return $this->redirect($this->generateUrl('a_main'));
        }
        return $this->render('EduEleraningBundle:Admin:addmanager.html.twig',array('form' => $form->createView()));
    }

    public function showuniversityAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $universities = $em->getRepository("EduEleraningBundle:university")->findAll();
        return $this->render('EduEleraningBundle:Admin:showuni.html.twig',array(
                'universities'=>$universities
            ));
    }

    public function extensionuniversity()
    {
        return $this->render('EduEleraningBundle:Admin:extensionuni.html.twig');
    }

} 