<?php
namespace Edu\EleraningBundle\Controller;

use Edu\EleraningBundle\Entity\university;
use Edu\EleraningBundle\Entity\user;
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
        $uni->setRegdate(new \DateTime());
        $modir = new user();
        $modir->addRole("ROLE_MANAGER");
        $modir->setEnabled(true);
        $uni->addUsere($modir);
        $modir->setUniversity($uni);

        $form = $this->createForm(new universityType(), $uni)
        ->add('submit', 'submit', array('label' => 'ثبت'));

        if($request->isMethod("POST"))
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($uni);
                $em->persist($modir);
                $em->flush();
                return $this->redirect($this->generateUrl('showuniversities'));
            }
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